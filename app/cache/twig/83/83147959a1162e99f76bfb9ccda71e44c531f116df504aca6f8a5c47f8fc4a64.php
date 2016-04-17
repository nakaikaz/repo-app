<?php

/* list.twig */
class __TwigTemplate_e22186ce45c811b3fb8a3549ad837887b21bdd202e46fb5f4147771618f29d03 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.twig", "list.twig", 1);
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
\t\t<div class=\"panel panel-primary\">
\t\t\t<div class=\"panel-heading\">
\t\t\t\t<div class=\"panel-title\">メモ一覧</div>
\t\t\t</div>
\t\t\t<div class=\"panel-body\">
\t\t\t\t<ul class=\"list-group\">
\t\t\t\t\t<li class=\"list-group-item\">
\t\t\t\t\t\t<div class=\"media\">
\t\t\t\t\t\t\t<a class=\"pull-left\" href=\"#\">
\t\t\t\t\t\t\t\t<img class=\"media-object\" src=\"http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png\" height=\"64\" width=\"64\">
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<div class=\"media-body\">
\t\t\t\t\t\t\t\t<h4 class=\"media-heading\">Media Heading</h4>
\t\t\t\t\t\t\t\t<p>Cras sit amet nibh libero, 
\t\t\t\t\t\t\t\t\tin gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. 
\t\t\t\t\t\t\t\t\tCras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"list-group-item\">
\t\t\t\t\t\t<div class=\"media\">
\t\t\t\t\t\t\t<a class=\"pull-left\" href=\"#\">
\t\t\t\t\t\t\t\t<img class=\"media-object\"i src=\"http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png\" height=\"64\" width=\"64\">
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<div class=\"media-body\">
\t\t\t\t\t\t\t\t<h4 class=\"media-heading\">Media Heading</h4>
\t\t\t\t\t\t\t\t<p>Cras sit amet nibh libero, 
\t\t\t\t\t\t\t\t\tin gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. 
\t\t\t\t\t\t\t\t\tCras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "list.twig";
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
/* 		<div class="panel panel-primary">*/
/* 			<div class="panel-heading">*/
/* 				<div class="panel-title">メモ一覧</div>*/
/* 			</div>*/
/* 			<div class="panel-body">*/
/* 				<ul class="list-group">*/
/* 					<li class="list-group-item">*/
/* 						<div class="media">*/
/* 							<a class="pull-left" href="#">*/
/* 								<img class="media-object" src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" height="64" width="64">*/
/* 							</a>*/
/* 							<div class="media-body">*/
/* 								<h4 class="media-heading">Media Heading</h4>*/
/* 								<p>Cras sit amet nibh libero, */
/* 									in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. */
/* 									Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>*/
/* 							</div>*/
/* 						</div>*/
/* 					</li>*/
/* 					<li class="list-group-item">*/
/* 						<div class="media">*/
/* 							<a class="pull-left" href="#">*/
/* 								<img class="media-object"i src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" height="64" width="64">*/
/* 							</a>*/
/* 							<div class="media-body">*/
/* 								<h4 class="media-heading">Media Heading</h4>*/
/* 								<p>Cras sit amet nibh libero, */
/* 									in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. */
/* 									Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>*/
/* 							</div>*/
/* 						</div>*/
/* 					</li>*/
/* 				</ul>*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
/* {% endblock %}*/
/* */
