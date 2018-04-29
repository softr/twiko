<?php
namespace softr\Twiko;

use Twig_Environment;

/**
 * Twig renderer.
 *
 * @copyright  Agência Softr <agencia.softr@gmail.com>
 * @license    http://www.makoframework.com/license
 */
class TwigRenderer implements \mako\view\renderers\RendererInterface
{
    /**
     * Twig instance.
     *
     * @var  Twig_Environment
     */
    private $twig;

    /**
     * Renderer constructor
     *
     * @param  Twig_Environment  $twig  Twig instance
     */
    public function __construct(Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * Render the view into a string.
     *
     * @return string The resulting view.
     * @throws SmartyException should anything fail with template parsing.
     */
    public function render(string $__view__, array $__variables__): string
    {
        $paths = $this->twig->getLoader()->getPaths();

        $__view__ = str_replace($paths[0], '', $__view__);

        $__view__ = ltrim($__view__, '/');

        foreach($__variables__ as $key => $value)
        {
            $this->twig->addGlobal($key, $value);
        }

        return $this->twig->render(str_replace($paths[0], '', $__view__), $__variables__);
    }
}
