<?php
namespace softr\Twiko\Extensions\Services;

use Twig_Extension;
use Twig_SimpleFunction;

use mako\http\routing\URLBuilder as MakoURLBuilder;
use mako\utility\Str as StrHelper;

/**
 * Bind URLBuilder Functions
 *
 * @copyright  Agência Softr <agencia.softr@gmail.com>
 * @license    http://www.makoframework.com/license
 */
class UrlBuilder extends Twig_Extension
{
    /**
     * @var mako\http\routing\URLBuilder
     */
    protected $urlBuilder;

    /**
     * URLBuilder Extension
     *
     * @param  mako\http\routing\URLBuilder  $urlBuilder  URL builder
     */
    public function __construct(MakoURLBuilder $urlBuilder)
    {
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'softr\Twiko_Extensions_Services_UrlBuilder';
    }

    /**
     * {@inheritDoc}
     */
    public function getFunctions()
    {
        return
        [
            new Twig_SimpleFunction('url', [$this->urlBuilder, 'to']),
            new Twig_SimpleFunction('url_*', function($name)
            {
                $arguments = array_slice(func_get_args(), 1);

                $name = StrHelper::underscored2camel($name);

                return call_user_func_array([$this->urlBuilder, $name], $arguments);
            }),
        ];
    }
}