<?php
namespace softr\Twiko;

use Twig_Environment;

/**
 * Twig renderer.
 *
 * @copyright  Agência Softr <agencia.softr@gmail.com>
 * @license    http://www.makoframework.com/license
 */
class TwigRenderer extends \mako\view\renderers\Renderer implements \mako\view\renderers\RendererInterface
{
    /**
     * Twig instance.
     *
     * @var  Twig_Environment
     */
    private $twig;

    /**
     * Set Twig Instance
     *
     * @param  Twig_Environment  $twig  Twig instance
     */
    public function setTwig(Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * Returns the rendered view.
     *
     * @access  public
     * @return  string
     */
    public function render()
    {
        $paths = $this->twig->getLoader()->getPaths();

        $view = ltrim(str_replace($paths[0], '', $this->view), '/');

        foreach($this->variables as $key => $value)
        {
            $this->twig->addGlobal($key, $value);
        }

        return $this->twig->render($view, $this->variables);
    }
}