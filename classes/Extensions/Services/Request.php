<?php
namespace softr\Twiko\Extensions\Services;

use Twig_Extension;
use Twig_SimpleFunction;

use mako\http\Request as RequestService;

/**
 * Bind Request Functions
 *
 * @copyright  Agência Softr <agencia.softr@gmail.com>
 * @license    http://www.makoframework.com/license
 */
class Request extends Twig_Extension
{
    /**
     * @var \mako\http\Request
     */
    protected $request;

    /**
     * Create a new input extension
     *
     * @param \mako\http\Request
     */
    public function __construct(RequestService $request)
    {
        $this->request = $request;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'Softr\Twiko_Extensions_Services_Input';
    }

    /**
     * {@inheritDoc}
     */
    public function getFunctions()
    {
        return
        [
            new Twig_SimpleFunction('request_get', [$this->request, 'get']),
            new Twig_SimpleFunction('request_post', [$this->request, 'post']),
            new Twig_SimpleFunction('request_put', [$this->request, 'put']),
            new Twig_SimpleFunction('request_patch', [$this->request, 'patch']),
            new Twig_SimpleFunction('request_has', [$this->request, 'has']),
            new Twig_SimpleFunction('request_cookie', [$this->request, 'cookie']),
            new Twig_SimpleFunction('request_referer', [$this->request, 'referer']),
            new Twig_SimpleFunction('request_path', [$this->request, 'path']),
            new Twig_SimpleFunction('request_language', [$this->request, 'language']),
            new Twig_SimpleFunction('request_method', [$this->request, 'method']),
            new Twig_SimpleFunction('request_base', [$this->request, 'baseURL']),
        ];
    }
}