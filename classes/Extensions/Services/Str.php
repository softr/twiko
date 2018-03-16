<?php
namespace softr\Twiko\Extensions\Services;

use Twig_Extension;
use Twig_SimpleFilter;
use Twig_SimpleFunction;

use mako\utility\Str as StrHelper;

/**
 * Bind Str Helper Functions
 *
 * @copyright  Agência Softr <agencia.softr@gmail.com>
 * @license    http://www.makoframework.com/license
 */
class Str extends Twig_Extension
{
    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'softr\Twiko_Extensions_Services_Str';
    }

    /**
     * {@inheritDoc}
     */
    public function getFunctions()
    {
        return
        [
            new Twig_SimpleFunction('str_*', function($name)
            {
                $arguments = array_slice(func_get_args(), 1);

                $name = StrHelper::underscored2camel($name);

                return call_user_func_array([StrHelper::class, $name], $arguments);
            }),
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getFilters()
    {
        return
        [
            new Twig_SimpleFilter('snake_case', [StrHelper::class, 'camel2underscored']),
            new Twig_SimpleFilter('camel_case', [StrHelper::class, 'underscored2camel']),
            new Twig_SimpleFilter('studly_case', function($string)
            {
                return StrHelper::underscored2camel($string, true);
            }),
            new Twig_SimpleFilter('str_*', function($name)
            {
                $arguments = array_slice(func_get_args(), 1);

                $name = StrHelper::underscored2camel($name);

                return call_user_func_array([StrHelper::class, $name], $arguments);
            }),
        ];
    }
}