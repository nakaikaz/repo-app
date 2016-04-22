<?php

/* navbar.html */
class __TwigTemplate_d547921054ca4c6586a9777c465bd6a6e3a108f6da27a41f8c3def6a8ba22bd1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<nav class=\"navbar navbar-inverse\">
    <div class=\"container-fluid\">
        <div class=\"navbar-header\">
            <a href=\"/reports/list\" class=\"navbar-brand\">日報アプリ</a>
        </div>
        <div>
            ";
        // line 7
        if ((isset($context["authenticated"]) ? $context["authenticated"] : null)) {
            // line 8
            echo "            <ul class=\"nav navbar-nav\">
                <li class=\"active\"><a href=\"/report/list\">一覧</a></li>
                <li><a href=\"/report/new\">新規作成</a></li>
            </ul>
            ";
        }
        // line 13
        echo "            <ul class=\"nav navbar-nav navbar-right\">
                ";
        // line 14
        if ((isset($context["authenticated"]) ? $context["authenticated"] : null)) {
            // line 15
            echo "                <li class=\"dropdown\">
                    <a aria-expand=\"false\" aria-haspopup=\"true\" role=\"button\" data-toggle=\"dropdown\" class=\"dropdown-toggle\">
                        ";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "name", array()), "html", null, true);
            echo "<span class=\"caret\"></span>
                    </a>
                    <ul class=\"dropdown-menu\">
                        <li><a href=\"/user/edit\">基本設定</a></li>
                        <li><a href=\"/account/logout\">ログアウト</a></li>
                    </ul>
                </li>
                ";
        } else {
            // line 25
            echo "                <li><a href=\"/account/login\">ログイン</a></li>
                ";
        }
        // line 27
        echo "            </ul>
        </div>
    </div>
</nav>";
    }

    public function getTemplateName()
    {
        return "navbar.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 27,  56 => 25,  45 => 17,  41 => 15,  39 => 14,  36 => 13,  29 => 8,  27 => 7,  19 => 1,);
    }
}
/* <nav class="navbar navbar-inverse">*/
/*     <div class="container-fluid">*/
/*         <div class="navbar-header">*/
/*             <a href="/reports/list" class="navbar-brand">日報アプリ</a>*/
/*         </div>*/
/*         <div>*/
/*             {% if authenticated %}*/
/*             <ul class="nav navbar-nav">*/
/*                 <li class="active"><a href="/report/list">一覧</a></li>*/
/*                 <li><a href="/report/new">新規作成</a></li>*/
/*             </ul>*/
/*             {% endif %}*/
/*             <ul class="nav navbar-nav navbar-right">*/
/*                 {% if authenticated %}*/
/*                 <li class="dropdown">*/
/*                     <a aria-expand="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle">*/
/*                         {{ user.name }}<span class="caret"></span>*/
/*                     </a>*/
/*                     <ul class="dropdown-menu">*/
/*                         <li><a href="/user/edit">基本設定</a></li>*/
/*                         <li><a href="/account/logout">ログアウト</a></li>*/
/*                     </ul>*/
/*                 </li>*/
/*                 {% else %}*/
/*                 <li><a href="/account/login">ログイン</a></li>*/
/*                 {% endif %}*/
/*             </ul>*/
/*         </div>*/
/*     </div>*/
/* </nav>*/
