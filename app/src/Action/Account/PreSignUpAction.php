<?php
namespace App\Action\Account;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class PreSignUpAction {

	private $logger;
	private $medoo;
	private $errorInfo;
	private $smtp;
	private $app;
	private $token;
	private $view;

	public function __construct($c){
		$this->logger = $c->get('monolog');
		$this->medoo = $c->get('medoo');
		$this->smtp = $c->get('smtp');
		$this->app = $c->get('app');
		$this->token = $c->get('token');
		$this->view = $c->get('view');
	}

    public function __invoke(Request $request, Response $response, $args){
        if($request->isGet()){
            $this->getHandler($request, $response, $args);
        }elseif($request->isPost()){
            $this->postHandler($request, $response, $args);
        }
    }

    private function postHandler($request, $response, $args){
		$this->logger->addInfo('pre_signup_email action dispatched.');
		$r = $request->getParsedBody();
		$count = $this->medoo->count('users', array('email' => $r['email']));
		if($count){
			return $response->withJson(array(
                'status' => false,
                'not_available' => true,
				'message' => 'The user with provided email exists!'
			));
		}
		// 本登録するための一時URLを作成
		$token = sha1($r['email'].session_id().microtime());
		// トークンを名前にしたテキストファイルをトークンディレクトリに作成
		$tokenFile = $this->token['dir'].$token;
		if(!touch($tokenFile)){
			return $response->withJson(array(
				'status' => false,
				'message' => 'Failed creating a token file.'
			));
		}
		// とりあえず一時間以内の登録でテスト
		$limit = time() + 3600;
        //$limit = time() + (7 * 24 * 60 * 60);
        $fileContents = json_encode(array('limit' => $limit, 'email' => $r['email']));
		if(!file_put_contents($tokenFile, $fileContents, LOCK_EX)){
			return $response->withJson(array(
				'status' => false,
				'message' => 'Failed creating a token file'
			));
		}

		$urlForRegister = 'http://'.$_SERVER['HTTP_HOST'].'/account/signup?t='.$token;
		if(!$this->sendPreSignUpEmail($r['email'], $urlForRegister, $errorInfo)){
			return $response->withJson(array(
				'status' => false,
				'message' => 'The email could not be sent.' . $errorInfo
			));
		}

		$response->withJson(array(
			'status' => true,
			'messge' => 'You can proceed next step.'
		));
	}

	private function sendPreSignUpEmail($email, $urlForRegister, &$errorInfo){
		$app = $this->app;
		$smtp = $this->smtp;
		$mailer = new \PHPMailer();
		$mailer->isSMTP();
		$mailer->Host = $smtp['host'];
		$mailer->SMTPAuth = true;
		$mailer->Username = $smtp['user'];
		$mailer->Password = $smtp['pass'];
		$mailer->SMTPSecure = 'ssl';
		$mailer->Port = $smtp['port'];

		$mailer->setFrom($smtp['sender']['email'], $smtp['sender']['name']);
		$mailer->addAddress($email);
		$mailer->CharSet = 'UTF-8';
		$mailer->Subject = '['.$app['name'].'] ユーザー登録の手続きのご案内';
		$mailer->Body =<<<EOT
{$app['name']}にお申し込みいただき、誠にありがとうございます。

下記のアカウント登録ページで、ユーザー情報の登録を行ってください。
{$urlForRegister}

--
{$app['name']}

		{$app['name']} 公式サイト・ブログ
		{$app['url']['official']}
		{$app['url']['blog']}

		{$app['name']} facebookページ
		{$app['url']['facebook']}

		運営元　◯◯会社
		{$app['url']['company']}
EOT;
		if(!$mailer->send()){
			$errorInfo = $mailer->ErrorInfo;
			return false;
		}

		return true;
	}

	private function getHandler($request, $response, $args){
		$this->logger->addInfo('pre_signup action dispatched.');

		$this->view->render($response, 'pre_signup.html', array(
			'authenticated' => false,
			'donePreSignUp' => false
		));
		return $response;
	}

}
