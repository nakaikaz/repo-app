<?php

/* login.twig */
class __TwigTemplate_647e6db34fef95972ff1970821fd5f2cd6ede079f7d1ea109eb05a9f3080559b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.twig", "login.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"row\">
\t<div class=\"col-md-12\">
\t\t<h1 class=\"text-center\">ログイン</h1>
\t\t<div id=\"login-alert\" class=\"alert alert-danger\" role=\"alert\">
\t\t\t<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
\t\t\t<span class=\"sr-only\">Error:</span>
\t\t\tメールアドレスかパスワードが間違っています。
\t\t</div>
\t</div>
</div>
<div class=\"row\">
\t<div class=\"col-md-offset-3 col-md-6\">
\t\t<form class=\"form-horizontal\" id=\"login-form\" role=\"form\" novalidate>
            <div class=\"form-group form-email-group\">
                <div class=\"col-sm-3\">
                    <label class=\"control-label\">メールアドレス</label>
                </div>
                <div class=\"col-sm-9\">
                    <input type=\"email\" id=\"login-email\" class=\"form-control\" placeholder=\"メールアドレス\" required/>
\t\t\t\t\t<p class=\"help-block error-message error-required\">メールアドレスを入力してください</p>
\t\t\t\t\t<p class=\"help-block error-message error-invalid\">メールアドレスの形式が不正です</p>
                </div>
\t\t\t</div>
\t\t\t<div class=\"form-group form-password-group\">
                <div class=\"col-sm-3\">
                    <label class=\"control-label\">パスワード</label>
                </div>
                <div class=\"col-sm-9\">
                    <input type=\"password\" id=\"login-password\" class=\"form-control\" placeholder=\"パスワード\" required/>
\t\t\t\t\t<p class=\"help-block error-message error-required\">パスワードを入力してください</p>
                </div>
\t\t\t</div>
\t\t\t<div class=\"form-group\">
\t\t\t\t<div class=\"col-sm-12\">
\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary btn-block\">ログイン</button>
\t\t\t\t</div>
\t\t\t</div>
\t\t</form>
\t\t<p class=\"text-center\"><a href=\"/account/pre_signup\">新規登録</a></p>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "base.twig" %}*/
/* */
/* {% block content %}*/
/* <div class="row">*/
/* 	<div class="col-md-12">*/
/* 		<h1 class="text-center">ログイン</h1>*/
/* 		<div id="login-alert" class="alert alert-danger" role="alert">*/
/* 			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>*/
/* 			<span class="sr-only">Error:</span>*/
/* 			メールアドレスかパスワードが間違っています。*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
/* <div class="row">*/
/* 	<div class="col-md-offset-3 col-md-6">*/
/* 		<form class="form-horizontal" id="login-form" role="form" novalidate>*/
/*             <div class="form-group form-email-group">*/
/*                 <div class="col-sm-3">*/
/*                     <label class="control-label">メールアドレス</label>*/
/*                 </div>*/
/*                 <div class="col-sm-9">*/
/*                     <input type="email" id="login-email" class="form-control" placeholder="メールアドレス" required/>*/
/* 					<p class="help-block error-message error-required">メールアドレスを入力してください</p>*/
/* 					<p class="help-block error-message error-invalid">メールアドレスの形式が不正です</p>*/
/*                 </div>*/
/* 			</div>*/
/* 			<div class="form-group form-password-group">*/
/*                 <div class="col-sm-3">*/
/*                     <label class="control-label">パスワード</label>*/
/*                 </div>*/
/*                 <div class="col-sm-9">*/
/*                     <input type="password" id="login-password" class="form-control" placeholder="パスワード" required/>*/
/* 					<p class="help-block error-message error-required">パスワードを入力してください</p>*/
/*                 </div>*/
/* 			</div>*/
/* 			<div class="form-group">*/
/* 				<div class="col-sm-12">*/
/* 					<button type="submit" class="btn btn-primary btn-block">ログイン</button>*/
/* 				</div>*/
/* 			</div>*/
/* 		</form>*/
/* 		<p class="text-center"><a href="/account/pre_signup">新規登録</a></p>*/
/* 	</div>*/
/* </div>*/
/* {% endblock %}*/
/* */
