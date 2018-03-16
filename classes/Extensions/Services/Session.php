<?php
namespace softr\Twiko\Extensions\Services;

use Twig_Extension;
use Twig_SimpleFunction;

use mako\session\Session as MakoSession;

/**
 * Bind Session Functions
 *
 * @copyright  Agência Softr <agencia.softr@gmail.com>
 * @license    http://www.makoframework.com/license
 */
class Session extends Twig_Extension
{
    /**
     * @var \mako\session\Session
     */
    protected $session;

    /**
     * Create a new session extension
     *
     * @param \mako\session\Session
     */
    public function __construct(MakoSession $session)
    {
        $this->session = $session;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'softr\Twiko_Extensions_Services_Session';
    }

    /**
     * {@inheritDoc}
     */
    public function getFunctions()
    {
        return
        [
            new Twig_SimpleFunction('session_id', [$this->session, 'getId']),
            new Twig_SimpleFunction('session_get', [$this->session, 'get']),
            new Twig_SimpleFunction('session_remove', [$this->session, 'remove']),
            new Twig_SimpleFunction('session_has', [$this->session, 'has']),
            new Twig_SimpleFunction('session_flash', [$this->session, 'getFlash']),
            new Twig_SimpleFunction('session_reflash', [$this->session, 'reflash']),
            new Twig_SimpleFunction('csrf_token', [$this->session, 'generateToken'], ['is_safe' => ['html']]),
        ];
    }
}
