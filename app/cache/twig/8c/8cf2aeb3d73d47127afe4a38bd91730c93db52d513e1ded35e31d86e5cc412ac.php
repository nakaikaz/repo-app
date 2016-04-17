<?php

/* pre_signup.twig */
class __TwigTemplate_3c19d31cd41bd50777b3fbf1f9378de2aa97cce425ac08a39de0cfc22e2a3ae5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.twig", "pre_signup.twig", 1);
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
\t\t<h1 class=\"text-center\">新規登録</h1>
\t\t<div id=\"pre-signup-alert\" class=\"alert alert-danger\" role=\"alert\">
\t\t\t<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
\t\t\t<span class=\"sr-only\">Error:</span>
\t\t\tこのメールアドレスは既に登録されています
\t\t</div>
\t</div>
</div>
<div class=\"row\">
\t<div class=\"col-md-offset-3 col-md-6\">
\t\t<div id=\"pre-signup-done-message\">
\t\t\t<h3>Report-appへの本登録はまだ完了していません。</h3>
\t\t\t<p>ご入力頂いたメールアドレス宛に本登録用のURLを送信しました。</p>
\t\t\t<p>メールに記載されたURLへアクセスして本登録を完了してください。</p>
\t\t</div>
\t\t<form class=\"form-horizontal\" id=\"pre-signup-form\" role=\"form\" novalidate>
            <div class=\"form-group form-name-group\">
                <div class=\"col-sm-3\">
                    <label class=\"control-label\">名前</label>
                </div>
                <div class=\"col-sm-9\">
                    <input type=\"email\" class=\"form-control\" placeholder=\"メールアドレス\" required/>
                    <p class=\"help-block error-message error-required\">メールアドレスを入力してください</p>
                    <p class=\"help-block error-message error-invalid\">メールアドレスの形式が不正です</p>
                </div>
\t\t\t</div>
\t\t\t<div class=\"form-group\">
\t\t\t\t<div class=\"col-sm-12\">
\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary btn-block\">次のステップへ</button>
\t\t\t\t</div>
\t\t\t</div>
\t\t</form>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "pre_signup.twig";
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
/* 		<h1 class="text-center">新規登録</h1>*/
/* 		<div id="pre-signup-alert" class="alert alert-danger" role="alert">*/
/* 			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>*/
/* 			<span class="sr-only">Error:</span>*/
/* 			このメールアドレスは既に登録されています*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
/* <div class="row">*/
/* 	<div class="col-md-offset-3 col-md-6">*/
/* 		<div id="pre-signup-done-message">*/
/* 			<h3>Report-appへの本登録はまだ完了していません。</h3>*/
/* 			<p>ご入力頂いたメールアドレス宛に本登録用のURLを送信しました。</p>*/
/* 			<p>メールに記載されたURLへアクセスして本登録を完了してください。</p>*/
/* 		</div>*/
/* 		<form class="form-horizontal" id="pre-signup-form" role="form" novalidate>*/
/*             <div class="form-group form-name-group">*/
/*                 <div class="col-sm-3">*/
/*                     <label class="control-label">名前</label>*/
/*                 </div>*/
/*                 <div class="col-sm-9">*/
/*                     <input type="email" class="form-control" placeholder="メールアドレス" required/>*/
/*                     <p class="help-block error-message error-required">メールアドレスを入力してください</p>*/
/*                     <p class="help-block error-message error-invalid">メールアドレスの形式が不正です</p>*/
/*                 </div>*/
/* 			</div>*/
/* 			<div class="form-group">*/
/* 				<div class="col-sm-12">*/
/* 					<button type="submit" class="btn btn-primary btn-block">次のステップへ</button>*/
/* 				</div>*/
/* 			</div>*/
/* 		</form>*/
/* 	</div>*/
/* </div>*/
/* {% endblock %}*/
/* */
