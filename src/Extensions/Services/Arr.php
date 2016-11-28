<?php
namespace softr\Twiko\Extensions\Services;

use Twig_Extension;
use Twig_SimpleFunction;

use mako\utility\Arr as ArrHelper;
use mako\utility\Str as StrHelper;

/**
 * Bind Array Helper Functions
 *
 * @copyright  Agência Softr <agencia.softr@gmail.com>
 * @license    http://www.makoframework.com/license
 */
class Arr extends Twig_Extension
{
    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'softr\Twiko_Extensions_Services_Arr';
    }

    /**
     * {@inheritDoc}
     */
    public function getFunctions()
    {
        return
        [
            new Twig_SimpleFunction('arr_*', function($name)
            {
                $arguments = array_slice(func_get_args(), 1);

                $name = StrHelper::underscored2camel($name);

                return call_user_func_array([ArrHelper::class, $name], $arguments);
            }),
        ];
    }
}