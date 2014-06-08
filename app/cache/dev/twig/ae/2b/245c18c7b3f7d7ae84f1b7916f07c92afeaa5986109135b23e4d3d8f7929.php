<?php

/* PanierFrontBundle:Default:panier.html.twig */
class __TwigTemplate_ae2b245c18c7b3f7d7ae84f1b7916f07c92afeaa5986109135b23e4d3d8f7929 extends Twig_Template
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
\tListe des produits de votre panier
</h1>

";
        // line 5
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "libelleProduit")) > 0)) {
            // line 6
            echo "
<form method=\"POST\" action=\"";
            // line 7
            echo $this->env->getExtension('routing')->getPath("panier_front_modifierQte");
            echo "\">
\t";
            // line 8
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(0, (twig_length_filter($this->env, $this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "libelleProduit")) - 1)));
            foreach ($context['_seq'] as $context["_key"] => $context["a"]) {
                // line 9
                echo "\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "libelleProduit"), (isset($context["a"]) ? $context["a"] : $this->getContext($context, "a")), array(), "array"), "html", null, true);
                echo " - 
\t\t";
                // line 10
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "taille"), (isset($context["a"]) ? $context["a"] : $this->getContext($context, "a")), array(), "array"), "html", null, true);
                echo " - 
\t\t";
                // line 11
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "couleur"), (isset($context["a"]) ? $context["a"] : $this->getContext($context, "a")), array(), "array"), "html", null, true);
                echo " -
\t\t<input type=\"text\" value=\"";
                // line 12
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "qteProduit"), (isset($context["a"]) ? $context["a"] : $this->getContext($context, "a")), array(), "array"), "html", null, true);
                echo "\" name=\"q[]\" /> | 

\t\t<a href=\"";
                // line 14
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("panier_front_spr", array("detail" => (((($this->getAttribute($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "libelleProduit"), (isset($context["a"]) ? $context["a"] : $this->getContext($context, "a")), array(), "array") . "-") . $this->getAttribute($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "taille"), (isset($context["a"]) ? $context["a"] : $this->getContext($context, "a")), array(), "array")) . "-") . $this->getAttribute($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "couleur"), (isset($context["a"]) ? $context["a"] : $this->getContext($context, "a")), array(), "array")))), "html", null, true);
                echo "\">Supprimer</a>

\t\t<br /><br />
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['a'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 18
            echo "
\t<input type=\"hidden\" name=\"action\" value=\"refresh\"/>
\t<input type=\"submit\" value=\"Mettre à jour quantité\" />
</form>
\t\t
\t<a href=\"";
            // line 23
            echo $this->env->getExtension('routing')->getPath("panier_front_saveCart");
            echo "\">Enregistrer la commande</a>


";
        } else {
            // line 27
            echo "\tVotre panier est vide!
";
        }
    }

    public function getTemplateName()
    {
        return "PanierFrontBundle:Default:panier.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 27,  73 => 23,  66 => 18,  56 => 14,  51 => 12,  47 => 11,  43 => 10,  38 => 9,  34 => 8,  30 => 7,  27 => 6,  25 => 5,  19 => 1,);
    }
}
