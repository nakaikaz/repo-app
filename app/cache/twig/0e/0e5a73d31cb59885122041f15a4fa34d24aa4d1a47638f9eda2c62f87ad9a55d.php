<?php

/* login.html */
class __TwigTemplate_eef50ccfd553acd8bbecdd4575d286ec2e9db0911ddb331010687acb30340cb2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html", "login.html", 1);
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
        $this->loadTemplate("navbar.html", "login.html", 4)->display($context);
        // line 5
        echo "<div class=\"section\">
\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12\">
\t\t\t\t<h1 class=\"text-center\">ログイン</h1>
\t\t\t\t<div id=\"login-alert\" class=\"alert alert-danger\" role=\"alert\">
\t\t\t\t\t<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
\t\t\t\t\t<span class=\"sr-only\">Error:</span>
\t\t\t\t\tメールアドレスかパスワードが間違っています。
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-offset-3 col-md-6\">
\t\t\t\t<form class=\"form-horizontal\" id=\"login-form\" role=\"form\" novalidate>
\t\t\t\t\t<div class=\"form-group form-email-group\">
\t\t\t\t\t\t<div class=\"col-sm-3\">
\t\t\t\t\t\t\t<label class=\"control-label\">メールアドレス</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input type=\"email\" id=\"login-email\" class=\"form-control\" placeholder=\"メールアドレス\" required/>
\t\t\t\t\t\t\t<p class=\"help-block error-message error-required\">メールアドレスを入力してください</p>
\t\t\t\t\t\t\t<p class=\"help-block error-message error-invalid\">メールアドレスの形式が不正です</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group form-password-group\">
\t\t\t\t\t\t<div class=\"col-sm-3\">
\t\t\t\t\t\t\t<label class=\"control-label\">パスワード</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input type=\"password\" id=\"login-password\" class=\"form-control\" placeholder=\"パスワード\" required/>
\t\t\t\t\t\t\t<p class=\"help-block error-message error-required\">パスワードを入力してください</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<div class=\"col-sm-12\">
\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary btn-block\">ログイン</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</form>
\t\t\t\t<p class=\"text-center\"><a href=\"/account/pre_signup\">新規登録</a></p>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
";
        // line 50
        $this->loadTemplate("progress-bar.html", "login.html", 50)->display($context);
    }

    public function getTemplateName()
    {
        return "login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 50,  33 => 5,  31 => 4,  28 => 3,  11 => 1,);
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
/* 				<h1 class="text-center">ログイン</h1>*/
/* 				<div id="login-alert" class="alert alert-danger" role="alert">*/
/* 					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>*/
/* 					<span class="sr-only">Error:</span>*/
/* 					メールアドレスかパスワードが間違っています。*/
/* 				</div>*/
/* 			</div>*/
/* 		</div>*/
/* 		<div class="row">*/
/* 			<div class="col-md-offset-3 col-md-6">*/
/* 				<form class="form-horizontal" id="login-form" role="form" novalidate>*/
/* 					<div class="form-group form-email-group">*/
/* 						<div class="col-sm-3">*/
/* 							<label class="control-label">メールアドレス</label>*/
/* 						</div>*/
/* 						<div class="col-sm-9">*/
/* 							<input type="email" id="login-email" class="form-control" placeholder="メールアドレス" required/>*/
/* 							<p class="help-block error-message error-required">メールアドレスを入力してください</p>*/
/* 							<p class="help-block error-message error-invalid">メールアドレスの形式が不正です</p>*/
/* 						</div>*/
/* 					</div>*/
/* 					<div class="form-group form-password-group">*/
/* 						<div class="col-sm-3">*/
/* 							<label class="control-label">パスワード</label>*/
/* 						</div>*/
/* 						<div class="col-sm-9">*/
/* 							<input type="password" id="login-password" class="form-control" placeholder="パスワード" required/>*/
/* 							<p class="help-block error-message error-required">パスワードを入力してください</p>*/
/* 						</div>*/
/* 					</div>*/
/* 					<div class="form-group">*/
/* 						<div class="col-sm-12">*/
/* 							<button type="submit" class="btn btn-primary btn-block">ログイン</button>*/
/* 						</div>*/
/* 					</div>*/
/* 				</form>*/
/* 				<p class="text-center"><a href="/account/pre_signup">新規登録</a></p>*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
/* {% include "progress-bar.html" %}*/
/* {% endblock %}*/
/* */
