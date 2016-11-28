<?php
namespace softr\Twiko\Extensions\Services;

use Twig_Extension;
use Twig_SimpleFunction;

use \mako\i18n\I18n as I18nService;

/**
 * Bind I18n Functions
 *
 * @copyright  Agência Softr <agencia.softr@gmail.com>
 * @license    http://www.makoframework.com/license
 */
class I18n extends Twig_Extension
{
    /**
     * @var \mako\i18n\I18n
     */
    protected $i18n;

    /**
     * Create a new i18n extension
     *
     * @param  \mako\i18n\I18n  $i18n  I18n instance.
     */
    public function __construct(I18nService $i18n)
    {
        $this->i18n = $i18n;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'softr\Twiko_Extensions_Services_I18n';
    }

    /**
     * {@inheritDoc}
     */
    public function getFunctions()
    {
        return
        [
            new Twig_SimpleFunction('i18n', [$this->i18n, 'get']),
            new Twig_SimpleFunction('i18n_get', [$this->i18n, 'get']),
            new Twig_SimpleFunction('i18n_has', [$this->i18n, 'has']),
        ];
    }
}
