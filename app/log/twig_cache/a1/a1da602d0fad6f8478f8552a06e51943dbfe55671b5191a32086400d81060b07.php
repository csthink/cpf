<?php

/* test/index.html */
class __TwigTemplate_e8532a4302275d8ef4e138840d2b20d8664be5841d10234328505042a66fe4f4 extends Twig_Template
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
        echo "<!doctype html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\"
          content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <title>模板</title>
</head>
<body>
<center>Hello ";
        // line 11
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo ", I'm ";
        echo twig_escape_filter($this->env, ($context["age"] ?? null), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, ($context["sex"] ?? null), "html", null, true);
        echo "</center>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "test/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 11,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!doctype html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\"
          content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <title>模板</title>
</head>
<body>
<center>Hello {{name}}, I'm {{age}} {{sex}}</center>
</body>
</html>
", "test/index.html", "/web/html/csthink/app/views/test/index.html");
    }
}
