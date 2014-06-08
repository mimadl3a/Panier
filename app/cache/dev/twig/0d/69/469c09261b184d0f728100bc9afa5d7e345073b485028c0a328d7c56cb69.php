<?php

/* PanierFrontBundle:Default:index.html.twig */
class __TwigTemplate_0d69469c09261b184d0f728100bc9afa5d7e345073b485028c0a328d7c56cb69 extends Twig_Template
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
        echo "<h1>
\tListe des produits
</h1>

";
        // line 5
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["produits"]) ? $context["produits"] : $this->getContext($context, "produits")));
        foreach ($context['_seq'] as $context["_key"] => $context["produit"]) {
            // line 6
            echo "\t<form method=\"GET\" action=\"";
            echo $this->env->getExtension('routing')->getPath("panier_front_ajouter");
            echo "\">
\t\t";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["produit"]) ? $context["produit"] : $this->getContext($context, "produit")), "libelle"), "html", null, true);
            echo "<br>
\t\tlibelle<input type=\"text\" name=\"libelle\" /><br>
\t\ttaille<input type=\"text\" name=\"taille\" /><br>
\t\tcouleur<input type=\"text\" name=\"couleur\" /><br>
\t\tqte<input type=\"text\" name=\"qte\" /><br>
\t\tprix<input type=\"text\" name=\"prix\" /><br>
\t\t<input type=\"submit\" value=\"Ajouter au panier\" /><br>
\t</form>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['produit'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "PanierFrontBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 7,  29 => 6,  25 => 5,  19 => 1,);
    }
}
