# Twiko

Twig Brige for Mako Framework

## Install

Use composer to install. Simply add package to your project.

```php
composer require softr/twiko
```

So now you can update your project with a single command.

```php
composer update
```


### Register Service

After installing you'll have to register the package in your ``app/config/application.php`` file.

```
'packages' =>
[
    ...
    'core' =>
    [
        ...
        // Register the package for web core
        'softr\Twiko\TwikoPackage',
    ]
    ...
],
```

Now your application is able to use Twig Template Engine.

## Enabling Extensions

This packages comes with a set of base extensions wich provide core functions such as ``config``, ``i18n``, ``session``, ``urlBuilder`` etc. To add/remove an extension please edit ``twiko::extensions.php`` config file.

## Clearing Cache

This packages provides a command to clear Twig Cache Files. To make use of it simply run ``php reactor twiko::clear``

## Compatibility

This package is compatible with Mako 4.2, 4.3, 4.4 and 4.5 versions