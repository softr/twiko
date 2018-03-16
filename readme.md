# Twiko

Twig Brige for Mako Framework

## Install

Use composer to install. Simply add package to your project.

```php
composer require softr/twiko:0.9.*
```

So now you can update your project with a single command.

```php
composer update
```


### Register Service

After installing you'll have to register the package in your ``app/config/application.php`` file.

```php
    /**
     * Services to register in the dependecy injection container.
     */

    'services' =>
    [
        ....
        'softr\Twiko\TwikoService',
    ],
```

Now your application is able to use Twig Template Engine.

## Enabling Extensions

This packages comes with a set of base extensions wich provide core functions such as ``config``, ``i18n``, ``session``, ``urlBuilder`` etc. To add/remove an extension please edit ``twiko::extensions.php`` config file.