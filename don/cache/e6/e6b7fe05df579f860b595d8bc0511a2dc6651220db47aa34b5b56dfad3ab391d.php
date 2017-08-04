<?php

/* test.html */
class __TwigTemplate_3a781da1ecfb86876375865d51372935ce94c25eda002ed93e561171d63ed50a extends Twig_Template
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
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>Title</title>
</head>
<body>
<h1>TWIG</h1>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "test.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "test.html", "D:\\programming\\UniServerZ\\www\\templates\\test.html");
    }
}
