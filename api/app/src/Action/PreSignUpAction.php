<?php
namespace App\Action;

use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class PreSignUpAction {

	private $logger;
	private $medoo;
	private $conf;
	private $errorInfo;

	public function __construct($container){
		$this->logger = $container->get('monolog');
		$this->medoo = $container->get('medoo');
		$smtpconf = $container->get('smtp.conf');
		$appconf = $container->get('app.conf');
		$this->conf = array(
			'app' => $appconf,
			'smtp' => $smtpconf
		);
	}

	public function __invoke(Request $request, Response $response, $args){
		$this->logger->addInfo('presignup action dispatched.');
		$r = $request->getParsedBody();
		$count = $this->medoo->count('users', array('email' => $r['email']));
		if($count){
			return $response->withJson(array(
				'status' => false,
				'message' => 'The user with provided email exists!'
			));
		}
		// 本登録するための一時URLを作成
		$token = sha1($r['email'].session_id().microtime());
		// トークンを名前にしたテキストファイルをトークンディレクトリに作成
		$tokenFile = dirname(__FILE__).'/../../../../token/'.$token;
		if(!touch($tokenFile)){
			return $response->withJson(array(
				'status' => false,
				'message' => 'Failed creating a token file.'
			));
		}
		// とりあえず一時間以内の登録でテスト
		$limit = time() + 3600;
		//$limit = time() + (7 * 24 * 60 * 60);
		if(!file_put_contents($tokenFile, $limit, LOCK_EX)){
			return $response->withJson(array(
				'status' => false,
				'message' => 'Failed creating a token file'
			));
		}

		$urlForRegister = 'http://'.$_SERVER['HTTP_HOST'].'/#/account/signup?t='.$token;
		if(!$this->sendPreSignUpEmail($r['email'], $urlForRegister)){
			return $response->withJson(array(
				'status' => false,
				'message' => 'The email could not be sent.' . $this->errorInfo
			));
		}

		$response->withJson(array(
			'status' => true,
			'messge' => 'You can proceed next step.'
		));
	}

	private function sendPreSignUpEmail($email, $urlForRegister){
		$conf = $this->conf;
		$smtp = new \PHPMailer();
		$smtp->isSMTP();
		$smtp->Host = $conf['smtp']['host'];
		$smtp->SMTPAuth = true;
		$smtp->Username = $conf['smtp']['user'];
		$smtp->Password = $conf['smtp']['pass'];
		$smtp->SMTPSecure = 'ssl';
		$smtp->Port = $conf['smtp']['port'];

		$smtp->setFrom($conf['smtp']['sender']['email'], $conf['smtp']['sender']['name']);
		$smtp->addAddress($email);
		$smtp->CharSet = 'UTF-8';
		$smtp->Subject = '['.$conf['app']['name'].'] ユーザー登録の手続きのご案内';
		$smtp->Body =<<<EOT
{$conf['app']['name']}にお申し込みいただき、誠にありがとうございます。

下記のアカウント登録ページで、ユーザー情報の登録を行ってください。
{$urlForRegister}

--
{$conf['app']['name']}

		{$conf['app']['name']} 公式サイト・ブログ
		{$conf['app']['url']['official']}
		{$conf['app']['url']['blog']}

		{$conf['app']['name']} facebookページ
		{$conf['app']['url']['facebook']}

		運営元　◯◯会社
		{$conf['app']['url']['company']}
EOT;
		if(!$smtp->send()){
			$this->errorInfo = $smtp->ErrorInfo;
			return false;
		}

		return true;
	}

}
