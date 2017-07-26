# vgwrap

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![StyleCI][ico-styleci]][link-styleci]
[![Total Downloads][ico-downloads]][link-downloads]

A Laravel 5 wrapper for the Vainglory API

## Structure

This project's structure.

```
src/
    config/
    Facade.php
    ServiceProvider.php
    VGWrapClient.php
    VGWrapException.php
tests/
...
```

## Install

Via Composer

``` bash
$ composer require agangofkittens/vgwrap
```

## Configuration

In your `config/app.php` add `agangofkittens\vgwrap\ServiceProvider::class,` to the end of providers array.
``` php
'providers' => [
    App\Providers\RouteServiceProvider::class,
    ...
    'agangofkittens\vgwrap\ServiceProvider',
],
```
At the end of `config/app.php` add `'VGWrap' => agangofkittens\vgwrap\Facade::class,` to the aliases array.
``` php
'aliases' => [
    'App' => Illuminate\Support\Facades\App::class,
    ...
    'VGWrap' => agangofkittens\vgwrap\Facade::class,
],
```

Next publish the config file:
``` bash
$ php artisan vendor:publish
```

Finally set your [API key](https://developer.vainglorygame.com/) by updating the `api-id` value in `config/vgwrap.php` or your `.env` file.
If necessary you can also modify the API endpoints in the aforementioned `config/vgwrap.php` file.

## Usage

``` php
// Fetch a player by using a playerName filter
$response = \VGWrap::get('shards/eu/players', [
    'query' => [
        'filter' => [
            'playerNames' => 'Adrame'
        ]
    ]
]);
$player = json_decode($response->getBody()->getContents());

// Or using a shortcut
$response = \VGWrap::getData('shards/eu/players', [
    'query' => [
        'filter' => [
            'playerNames' => 'Adrame'
        ]
    ]
]);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email agangofkittens@gmail.com instead of using the issue tracker.

## Credits

- [agangofkittens][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/agangofkittens/vgwrap.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/agangofkittens/vgwrap.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/98232070/shield

[link-packagist]: https://packagist.org/packages/agangofkittens/vgwrap
[link-downloads]: https://packagist.org/packages/agangofkittens/vgwrap
[link-author]: https://github.com/agangofkittens
[link-contributors]: ../../contributors
[link-styleci]: https://styleci.io/repos/98232070
