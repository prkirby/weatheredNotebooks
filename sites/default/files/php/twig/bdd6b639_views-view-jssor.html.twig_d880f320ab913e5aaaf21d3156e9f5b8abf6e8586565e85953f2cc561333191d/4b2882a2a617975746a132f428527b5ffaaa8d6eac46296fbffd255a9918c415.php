<?php

/* modules/jssor/templates/views-view-jssor.html.twig */
class __TwigTemplate_922c3008005cd568d503dadd79bcdc9973cda03f3f197727e4300219be30174a extends Twig_Template
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
        $tags = array("if" => 23, "for" => 32);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('if', 'for'),
                array(),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 22
        echo "
";
        // line 23
        if ((isset($context["title"]) ? $context["title"] : null)) {
            // line 24
            echo "  <h3>";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true));
            echo "</h3>
";
        }
        // line 26
        echo "

<div id=\"";
        // line 28
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["slider_id"]) ? $context["slider_id"] : null), "html", null, true));
        echo "\" style=\"position: relative; margin: 0 auto; top: 0; left: 0; width: 1300px; height: 600px; overflow: hidden;\">

  <!-- Slides Container -->
  <div data-u=\"slides\" style=\"cursor: move; position: absolute; left: 0; top: 0; width: 1300px; height: 600px; overflow: hidden;\">
    ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["rows"]) ? $context["rows"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 33
            echo "      <div>
        ";
            // line 34
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["row"], "content", array()), "html", null, true));
            echo "
      </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "  </div>

  <!-- Bullet navigator -->
  ";
        // line 40
        if ((isset($context["bulletnavigator"]) ? $context["bulletnavigator"] : null)) {
            // line 41
            echo "    <div u=\"navigator\" class=\"jssorb";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["bulletskin"]) ? $context["bulletskin"] : null), "html", null, true));
            echo "\" style=\"position: absolute; bottom: 16px; right: 6px;\">
      <div u=\"prototype\" style=\"position: absolute; width: 16px; height: 16px;\"></div>
    </div>
  ";
        }
        // line 45
        echo "
  <!-- Arrows navigator -->
  ";
        // line 47
        if ((isset($context["arrownavigator"]) ? $context["arrownavigator"] : null)) {
            // line 48
            echo "    <span data-u=\"arrowleft\" class=\"jssora";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["arrowskin"]) ? $context["arrowskin"] : null), "html", null, true));
            echo "l\"></span>
    <span data-u=\"arrowright\" class=\"jssora";
            // line 49
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["arrowskin"]) ? $context["arrowskin"] : null), "html", null, true));
            echo "r\"></span>
  ";
        }
        // line 51
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "modules/jssor/templates/views-view-jssor.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 51,  107 => 49,  102 => 48,  100 => 47,  96 => 45,  88 => 41,  86 => 40,  81 => 37,  72 => 34,  69 => 33,  65 => 32,  58 => 28,  54 => 26,  48 => 24,  46 => 23,  43 => 22,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Default theme implementation to display a view of jssor slider.*/
/*  **/
/*  * Available variables:*/
/*  * - slider_id: Unique slider ID. Unfortunately Jssor Slider require an ID.*/
/*  * - title: The title of this group of rows. May be empty.*/
/*  * - rows: A list of the view's row items.*/
/*  *   - attributes: The row's HTML attributes.*/
/*  *   - content: The row's content.*/
/*  * - arrowskin: Arrow skin*/
/*  * - bulletskin: Bullet skin.*/
/*  * - bulletnavigator: Enable or not the bullet navigator.*/
/*  * - arrownavigator: Enable or not the arrow navigator.*/
/*  **/
/*  * @see template_preprocess_jssor()*/
/*  **/
/*  * @ingroup themeable*/
/*  *//* */
/* #}*/
/* */
/* {% if title %}*/
/*   <h3>{{ title }}</h3>*/
/* {% endif %}*/
/* */
/* */
/* <div id="{{ slider_id }}" style="position: relative; margin: 0 auto; top: 0; left: 0; width: 1300px; height: 600px; overflow: hidden;">*/
/* */
/*   <!-- Slides Container -->*/
/*   <div data-u="slides" style="cursor: move; position: absolute; left: 0; top: 0; width: 1300px; height: 600px; overflow: hidden;">*/
/*     {% for row in rows %}*/
/*       <div>*/
/*         {{ row.content }}*/
/*       </div>*/
/*     {% endfor %}*/
/*   </div>*/
/* */
/*   <!-- Bullet navigator -->*/
/*   {% if bulletnavigator %}*/
/*     <div u="navigator" class="jssorb{{ bulletskin }}" style="position: absolute; bottom: 16px; right: 6px;">*/
/*       <div u="prototype" style="position: absolute; width: 16px; height: 16px;"></div>*/
/*     </div>*/
/*   {% endif %}*/
/* */
/*   <!-- Arrows navigator -->*/
/*   {% if arrownavigator %}*/
/*     <span data-u="arrowleft" class="jssora{{ arrowskin }}l"></span>*/
/*     <span data-u="arrowright" class="jssora{{ arrowskin }}r"></span>*/
/*   {% endif %}*/
/* </div>*/
/* */
