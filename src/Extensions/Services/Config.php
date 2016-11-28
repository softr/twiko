<?php
namespace softr\Twiko\Extensions\Services;

use Twig_Extension;
use Twig_SimpleFunction;

use \mako\config\Config as ConfigService;

/**
 * Bind Config Functions
 *
 * @copyright  Agência Softr <agencia.softr@gmail.com>
 * @license    http://www.makoframework.com/license
 */
class Config extends Twig_Extension
{
    /**
     * @var \mako\config\Config
     */
    protected $config;

    /**
     * Create a new config extension
     *
     * @param  \mako\config\Config  $config  Config instance.
     */
    public function __construct(ConfigService $config)
    {
        $this->config = $config;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'softr\Twiko_Extensions_Services_Config';
    }

    /**
     * {@inheritDoc}
     */
    public function getFunctions()
    {
        return
        [
            new Twig_SimpleFunction('config', [$this->config, 'get']),
            new Twig_SimpleFunction('config_get', [$this->config, 'get']),
            new Twig_SimpleFunction('config_has', [$this->config, 'has']),
        ];
    }
}
