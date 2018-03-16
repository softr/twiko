<?php
namespace softr\Twiko;

use Twig_Environment;
use Twig_Loader_Filesystem;

use \softr\Twiko\TwigRenderer;

/**
 * Twiko service.
 *
 * @license    http://www.makoframework.com/license
 */
class TwikoService extends \mako\application\services\Service
{
    /**
     * Register the service.
     *
     * @access  public
     */
    public function register()
    {
        $this->initializeRenderer();

        $this->registerRenderer();
    }

    /**
     * Initialize Twig Renderer
     *
     * @access  private
     * @return  void
     */
    private function initializeRenderer()
    {
        $this->container->registerSingleton([Twig_Environment::class, 'twig'], function($container)
        {
            $environment = $container->get('config')->get('twiko::config.environment', []);

            $loader = new Twig_Loader_Filesystem(MAKO_APPLICATION_PATH . '/views/');

            return new Twig_Environment($loader, $environment);
        });

        $extensions = $this->container->get('config')->get('twiko::extensions.enabled');

        foreach($extensions as $class)
        {
            $extension = $this->container->get($class);

            $this->container->get('twig')->addExtension($extension);
        }

        $globals = $this->container->get('config')->get('twiko::config.globals');

        foreach($globals as $key => $value)
        {
            $this->container->get('twig')->addGlobal($key, $value);
        }
    }

    /**
     * Register View Renderer
     *
     * @access  private
     * @return  void
     */
    private function registerRenderer()
    {
        $container = $this->container;

        $extension = $this->container->get('config')->get('twiko::config.extension');

        $this->container->get('view')->registerRenderer($extension, function($view, $parameters) use($container)
        {
            $renderer = new TwigRenderer($view, $parameters);

            $renderer->setTwig($container->get('twig'));

            return $renderer;
        });
    }
}