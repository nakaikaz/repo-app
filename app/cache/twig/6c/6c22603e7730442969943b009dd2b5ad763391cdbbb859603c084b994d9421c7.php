<?php

/* signup.twig */
class __TwigTemplate_26713a1d17e39d32e4947b878564adb6aeac44e4fabf2f7fe005f977e9806e07 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.twig", "signup.twig", 1);
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
\t\t<h1 class=\"text-center\">ユーザー登録</h1>
\t</div>
</div>
<div class=\"row\">
\t<div class=\"col-md-offset-3 col-md-6\">
\t\t<form class=\"form-horizontal\" id=\"signup-form\" role=\"form\" novalidate>
\t\t\t<div class=\"form-group form-name-group\">
\t\t\t\t<div class=\"col-sm-3\">
\t\t\t\t\t<label class=\"control-label\">名前</label>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t<input type=\"text\" class=\"form-control\" id=\"signup-name\" placeholder=\"名前\">
\t\t\t\t\t<p class=\"help-block error-message error-required\">名前を入力してください</p>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"form-group form-email-group\">
\t\t\t\t<div class=\"col-sm-3\">
\t\t\t\t\t<label class=\"control-label\">メールアドレス</label>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t<label class=\"control-label\">";
        // line 26
        echo twig_escape_filter($this->env, (isset($context["email"]) ? $context["email"] : null), "html", null, true);
        echo "</label>
\t\t\t\t\t<input type=\"hidden\" id=\"signup-email\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, (isset($context["email"]) ? $context["email"] : null), "html", null, true);
        echo "\" placeholder=\"メールアドレス\" >
\t\t\t\t\t<p class=\"help-block error-message error-required\">メールアドレスを入力してください</p>
\t\t\t\t\t<p class=\"help-block error-message error-invalid\">メールアドレスの形式が不正です</p>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"form-group form-password-group\">
\t\t\t\t<div class=\"col-sm-3\">
\t\t\t\t\t<label class=\"control-label\">パスワード</label>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t<input type=\"password\" class=\"form-control\" id=\"signup-password\" placeholder=\"パスワード（半角英数字８文字以上）\">
\t\t\t\t\t<p class=\"help-block error-message error-required\">パスワードを入力してください</p>
\t\t\t\t\t<p class=\"help-block error-message error-minlength\">パスワードは８文字以上入力してください</p>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"form-group form-confirmation-group\">
\t\t\t\t<div class=\"col-sm-3\">
\t\t\t\t\t<label class=\"control-label\">パスワード確認</label>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t<input type=\"password\" class=\"form-control\" id=\"signup-confirmation\" placeholder=\"もう一度同じパスワードを入力してください\">
\t\t\t\t\t<p class=\"help-block error-message error-passwordNoMatch\">パスワードが不一致です</p>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<input type=\"hidden\" id=\"signup-token\" value=\"";
        // line 51
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : null), "html", null, true);
        echo "\">
\t\t\t<div class=\"form-group\">
\t\t\t\t<div class=\"col-sm-12\">
\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary btn-block\">次のステップへ</button>
\t\t\t\t</div>
\t\t\t</div>
        </form>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "signup.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 51,  59 => 27,  55 => 26,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "base.twig" %}*/
/* */
/* {% block content %}*/
/* <div class="row">*/
/* 	<div class="col-md-12">*/
/* 		<h1 class="text-center">ユーザー登録</h1>*/
/* 	</div>*/
/* </div>*/
/* <div class="row">*/
/* 	<div class="col-md-offset-3 col-md-6">*/
/* 		<form class="form-horizontal" id="signup-form" role="form" novalidate>*/
/* 			<div class="form-group form-name-group">*/
/* 				<div class="col-sm-3">*/
/* 					<label class="control-label">名前</label>*/
/* 				</div>*/
/* 				<div class="col-sm-9">*/
/* 					<input type="text" class="form-control" id="signup-name" placeholder="名前">*/
/* 					<p class="help-block error-message error-required">名前を入力してください</p>*/
/* 				</div>*/
/* 			</div>*/
/* 			<div class="form-group form-email-group">*/
/* 				<div class="col-sm-3">*/
/* 					<label class="control-label">メールアドレス</label>*/
/* 				</div>*/
/* 				<div class="col-sm-9">*/
/* 					<label class="control-label">{{email}}</label>*/
/* 					<input type="hidden" id="signup-email" value="{{email}}" placeholder="メールアドレス" >*/
/* 					<p class="help-block error-message error-required">メールアドレスを入力してください</p>*/
/* 					<p class="help-block error-message error-invalid">メールアドレスの形式が不正です</p>*/
/* 				</div>*/
/* 			</div>*/
/* 			<div class="form-group form-password-group">*/
/* 				<div class="col-sm-3">*/
/* 					<label class="control-label">パスワード</label>*/
/* 				</div>*/
/* 				<div class="col-sm-9">*/
/* 					<input type="password" class="form-control" id="signup-password" placeholder="パスワード（半角英数字８文字以上）">*/
/* 					<p class="help-block error-message error-required">パスワードを入力してください</p>*/
/* 					<p class="help-block error-message error-minlength">パスワードは８文字以上入力してください</p>*/
/* 				</div>*/
/* 			</div>*/
/* 			<div class="form-group form-confirmation-group">*/
/* 				<div class="col-sm-3">*/
/* 					<label class="control-label">パスワード確認</label>*/
/* 				</div>*/
/* 				<div class="col-sm-9">*/
/* 					<input type="password" class="form-control" id="signup-confirmation" placeholder="もう一度同じパスワードを入力してください">*/
/* 					<p class="help-block error-message error-passwordNoMatch">パスワードが不一致です</p>*/
/* 				</div>*/
/* 			</div>*/
/* 			<input type="hidden" id="signup-token" value="{{token}}">*/
/* 			<div class="form-group">*/
/* 				<div class="col-sm-12">*/
/* 					<button type="submit" class="btn btn-primary btn-block">次のステップへ</button>*/
/* 				</div>*/
/* 			</div>*/
/*         </form>*/
/*     </div>*/
/* </div>*/
/* {% endblock %}*/
/* */
