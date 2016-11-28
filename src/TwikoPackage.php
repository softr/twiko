<?php
namespace softr\Twiko;

use Twig_Environment;
use Twig_Loader_Filesystem;

use \softr\Twiko\TwigRenderer;

/**
 * Twiko package.
 *
 * @copyright  Agência Softr <agencia.softr@gmail.com>
 * @license    http://www.makoframework.com/license
 */
class TwikoPackage extends \mako\application\Package
{
    /**
     * Package name.
     *
     * @var string
     */
    protected $packageName = 'softr/twiko';

    /**
     * Package namespace.
     *
     * @var string
     */
    protected $fileNamespace = 'twiko';

    /**
     * Commands.
     *
     * @var array
     */
    protected $commands =
    [
        'twiko::clear' => 'softr\Twiko\Console\Commands\Clear',
    ];

    /**
     * Register the service.
     *
     * @access  protected
     */
    protected function bootstrap()
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

            $loader = new Twig_Loader_Filesystem($container->get('app')->getPath() . '/resources/views/');

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
            $twig->addGlobal($key, $value);
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

        $this->container->get('view')->extend($extension, function() use($container)
        {
            $twig = $container->get('twig');

            return new TwigRenderer($twig);
        });
    }
}