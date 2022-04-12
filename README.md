# Languages

[![Software License][ico-license]](LICENSE.md)

## About

The `languages` package to get header `content-language` and set value to life of request .

##### [Tutorial how create composer package](https://cirelramos.blogspot.com/2022/04/how-create-composer-package.html)

## Installation

Require the `cirelramos/languages` package in your `composer.json` and update your dependencies:
```sh
composer require cirelramos/languages
```


## Configuration

set provider

```php
'providers' => [
    // ...
    Cirelramos\Languages\Providers\ServiceProvider::class,
],
```


The defaults are set in `config/languages.php`. Publish the config to copy the file to your own config:
```sh
php artisan vendor:publish --provider="Cirelramos\Languages\Providers\ServiceProvider"
```

> **Note:** this is necessary to yo can change default config



## Usage

add provider in config/app.php

```php
        'api' => [
        // .
        // .
            Cirelramos\Languages\Middlewares\LanguageMiddleware::class,
        ],
```


## License

Released under the MIT License, see [LICENSE](LICENSE).


[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square

