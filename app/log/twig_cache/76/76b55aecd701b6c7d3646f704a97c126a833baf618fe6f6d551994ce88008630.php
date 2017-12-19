<?php

/* index.html */
class __TwigTemplate_5e9533c4b31b6066d225625cdb09b21da6a481c1465615fe94b212f33a9614dd extends Twig_Template
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
        return "index.html";
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
", "index.html", "/web/html/csthink/app/views/index.html");
    }
}
