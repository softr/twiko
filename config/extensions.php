<?php

return
[
    /**
     * ---------------------------------------------------------
     * Extensions
     * ---------------------------------------------------------
     *
     * Set wich extensions should be enabled on twig.
     */
    'enabled' =>
    [
        'softr\Twiko\Extensions\Services\Arr',
        'softr\Twiko\Extensions\Services\Config',
        'softr\Twiko\Extensions\Services\I18n',
        'softr\Twiko\Extensions\Services\Session',
        'softr\Twiko\Extensions\Services\Str',
        'softr\Twiko\Extensions\Services\Request',
        'softr\Twiko\Extensions\Services\UrlBuilder',
    ],
];