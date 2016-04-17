<?php

/* pre_signup.html */
class __TwigTemplate_8d63b9b5f2684bcb34360a4ac89bd5c7fa6119533b0d6d7610578a180e18bf71 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html", "pre_signup.html", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        $this->loadTemplate("navbar.html", "pre_signup.html", 4)->display($context);
        // line 5
        echo "<div class=\"section\">
\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12\">
\t\t\t\t<h1 class=\"text-center\">新規登録</h1>
\t\t\t\t<div id=\"pre-signup-alert\" class=\"alert alert-danger\" role=\"alert\">
\t\t\t\t\t<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
\t\t\t\t\t<span class=\"sr-only\">Error:</span>
\t\t\t\t\tこのメールアドレスは既に登録されています
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-offset-3 col-md-6\">
\t\t\t\t<div id=\"pre-signup-done-message\">
\t\t\t\t\t<h3>Report-appへの本登録はまだ完了していません。</h3>
\t\t\t\t\t<p>ご入力頂いたメールアドレス宛に本登録用のURLを送信しました。</p>
\t\t\t\t\t<p>メールに記載されたURLへアクセスして本登録を完了してください。</p>
\t\t\t\t</div>
\t\t\t\t<form class=\"form-horizontal\" id=\"pre-signup-form\" role=\"form\" novalidate>
\t\t\t\t\t<div class=\"form-group form-name-group\">
\t\t\t\t\t\t<div class=\"col-sm-3\">
\t\t\t\t\t\t\t<label class=\"control-label\">名前</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input type=\"email\" class=\"form-control\" placeholder=\"メールアドレス\" required/>
\t\t\t\t\t\t\t<p class=\"help-block error-message error-required\">メールアドレスを入力してください</p>
\t\t\t\t\t\t\t<p class=\"help-block error-message error-invalid\">メールアドレスの形式が不正です</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<div class=\"col-sm-12\">
\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary btn-block\">次のステップへ</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
";
        // line 45
        $this->loadTemplate("progress-bar.html", "pre_signup.html", 45)->display($context);
    }

    public function getTemplateName()
    {
        return "pre_signup.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 45,  33 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "base.html" %}*/
/* */
/* {% block content %}*/
/* {% include "navbar.html" %}*/
/* <div class="section">*/
/* 	<div class="container">*/
/* 		<div class="row">*/
/* 			<div class="col-md-12">*/
/* 				<h1 class="text-center">新規登録</h1>*/
/* 				<div id="pre-signup-alert" class="alert alert-danger" role="alert">*/
/* 					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>*/
/* 					<span class="sr-only">Error:</span>*/
/* 					このメールアドレスは既に登録されています*/
/* 				</div>*/
/* 			</div>*/
/* 		</div>*/
/* 		<div class="row">*/
/* 			<div class="col-md-offset-3 col-md-6">*/
/* 				<div id="pre-signup-done-message">*/
/* 					<h3>Report-appへの本登録はまだ完了していません。</h3>*/
/* 					<p>ご入力頂いたメールアドレス宛に本登録用のURLを送信しました。</p>*/
/* 					<p>メールに記載されたURLへアクセスして本登録を完了してください。</p>*/
/* 				</div>*/
/* 				<form class="form-horizontal" id="pre-signup-form" role="form" novalidate>*/
/* 					<div class="form-group form-name-group">*/
/* 						<div class="col-sm-3">*/
/* 							<label class="control-label">名前</label>*/
/* 						</div>*/
/* 						<div class="col-sm-9">*/
/* 							<input type="email" class="form-control" placeholder="メールアドレス" required/>*/
/* 							<p class="help-block error-message error-required">メールアドレスを入力してください</p>*/
/* 							<p class="help-block error-message error-invalid">メールアドレスの形式が不正です</p>*/
/* 						</div>*/
/* 					</div>*/
/* 					<div class="form-group">*/
/* 						<div class="col-sm-12">*/
/* 							<button type="submit" class="btn btn-primary btn-block">次のステップへ</button>*/
/* 						</div>*/
/* 					</div>*/
/* 				</form>*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
/* {% include "progress-bar.html" %}*/
/* {% endblock %}*/
/* */
