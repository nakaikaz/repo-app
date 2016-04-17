<?php

/* base.twig */
class __TwigTemplate_2bbfdb97c5a78396199b4c33c05daa7dc9b2eb47ffb15a97fdf845492ee46880 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"ja\">
<head>
\t<meta charset=\"UTF-8\">
\t<link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["appUrl"]) ? $context["appUrl"] : null), "html", null, true);
        echo "/vendor/twbs/bootstrap/dist/css/bootstrap.min.css\">
\t<link rel=\"stylesheet\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["appUrl"]) ? $context["appUrl"] : null), "html", null, true);
        echo "/vendor/twbs/bootstrap/dist/css/bootstrap-theme.min.css\">
\t<link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["appUrl"]) ? $context["appUrl"] : null), "html", null, true);
        echo "/css/style.css\">
\t<script src=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["appUrl"]) ? $context["appUrl"] : null), "html", null, true);
        echo "/vendor/components/jquery/jquery.js\"></script>
\t<script src=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["appUrl"]) ? $context["appUrl"] : null), "html", null, true);
        echo "/vendor/twbs/bootstrap/dist/js/bootstrap.min.js\"></script>
\t<script src=\"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["appUrl"]) ? $context["appUrl"] : null), "html", null, true);
        echo "/js/";
        echo twig_escape_filter($this->env, (isset($context["script"]) ? $context["script"] : null), "html", null, true);
        echo ".js\"></script>
\t<title></title>
</head>
<body>
\t<nav class=\"navbar navbar-inverse\">
\t\t<div class=\"container-fluid\">
\t\t\t<div class=\"navbar-header\">
\t\t\t\t<a class=\"navbar-brand\" href=\"/reports/list\">日報アプリ</a>
\t\t\t</div>
\t\t\t<div>
\t\t\t\t";
        // line 20
        if ((isset($context["authenticated"]) ? $context["authenticated"] : null)) {
            // line 21
            echo "\t\t\t\t<ul class=\"nav navbar-nav\">
\t\t\t\t\t<li class=\"active\"><a href=\"/reports/list\">一覧</a></li>
\t\t\t\t\t<li><a href=\"/repot/new\">新規作成</a></li>
\t\t\t\t</ul>
\t\t\t\t";
        }
        // line 26
        echo "\t\t\t\t<ul class=\"nav navbar-nav navbar-right\">
\t\t\t\t\t";
        // line 27
        if ((isset($context["authenticated"]) ? $context["authenticated"] : null)) {
            // line 28
            echo "\t\t\t\t\t<li class=\"dropdown\">
\t\t\t\t\t\t<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"down\" aria-haspopup=\"true\" aria-expand=\"false\">
\t\t\t\t\t\t\t";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "name", array()), "html", null, true);
            echo "<span class=\"caret\"></span>
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<ul class=\"dropdown-menu\">
\t\t\t\t\t\t\t<li><a href=\"/user/edit\">基本設定</a></li>
\t\t\t\t\t\t\t<li><a href=\"/account/logout\">ログアウト</a></li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</li>
\t\t\t\t\t";
        }
        // line 38
        echo "\t\t\t\t\t<li><a href=\"/account/login\">ログイン</a></li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>
\t</nav>
\t<div class=\"section\">
\t\t<div class=\"container\">
\t\t\t";
        // line 45
        $this->displayBlock('content', $context, $blocks);
        // line 46
        echo "\t\t\t";
        $this->loadTemplate("progress-bar.html", "base.twig", 46)->display($context);
        // line 47
        echo "\t\t</div>
\t</div>
</body>
</html>
";
    }

    // line 45
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "base.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 45,  104 => 47,  101 => 46,  99 => 45,  90 => 38,  79 => 30,  75 => 28,  73 => 27,  70 => 26,  63 => 21,  61 => 20,  46 => 10,  42 => 9,  38 => 8,  34 => 7,  30 => 6,  26 => 5,  20 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="ja">*/
/* <head>*/
/* 	<meta charset="UTF-8">*/
/* 	<link rel="stylesheet" href="{{appUrl}}/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">*/
/* 	<link rel="stylesheet" href="{{appUrl}}/vendor/twbs/bootstrap/dist/css/bootstrap-theme.min.css">*/
/* 	<link rel="stylesheet" href="{{appUrl}}/css/style.css">*/
/* 	<script src="{{appUrl}}/vendor/components/jquery/jquery.js"></script>*/
/* 	<script src="{{appUrl}}/vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>*/
/* 	<script src="{{appUrl}}/js/{{script}}.js"></script>*/
/* 	<title></title>*/
/* </head>*/
/* <body>*/
/* 	<nav class="navbar navbar-inverse">*/
/* 		<div class="container-fluid">*/
/* 			<div class="navbar-header">*/
/* 				<a class="navbar-brand" href="/reports/list">日報アプリ</a>*/
/* 			</div>*/
/* 			<div>*/
/* 				{% if authenticated %}*/
/* 				<ul class="nav navbar-nav">*/
/* 					<li class="active"><a href="/reports/list">一覧</a></li>*/
/* 					<li><a href="/repot/new">新規作成</a></li>*/
/* 				</ul>*/
/* 				{% endif %}*/
/* 				<ul class="nav navbar-nav navbar-right">*/
/* 					{% if authenticated %}*/
/* 					<li class="dropdown">*/
/* 						<a class="dropdown-toggle" data-toggle="dropdown" role="down" aria-haspopup="true" aria-expand="false">*/
/* 							{{user.name}}<span class="caret"></span>*/
/* 						</a>*/
/* 						<ul class="dropdown-menu">*/
/* 							<li><a href="/user/edit">基本設定</a></li>*/
/* 							<li><a href="/account/logout">ログアウト</a></li>*/
/* 						</ul>*/
/* 					</li>*/
/* 					{% endif %}*/
/* 					<li><a href="/account/login">ログイン</a></li>*/
/* 				</ul>*/
/* 			</div>*/
/* 		</div>*/
/* 	</nav>*/
/* 	<div class="section">*/
/* 		<div class="container">*/
/* 			{% block content %}{% endblock %}*/
/* 			{% include "progress-bar.html" %}*/
/* 		</div>*/
/* 	</div>*/
/* </body>*/
/* </html>*/
/* */
