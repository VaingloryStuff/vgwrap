# vgwrap

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![StyleCI][ico-styleci]][link-styleci]
[![Total Downloads][ico-downloads]][link-downloads]

A Laravel wrapper for the Vainglory API

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

Then publish the config file:
``` shell
$ php artisan vendor:publish
```

Then set your [API key](https://developer.vainglorygame.com/) by updating the `api-id` value in `config/vgwrap.php` or your `.env` file.

## Usage

``` php
// Fetch a player by ID
$response = \VGWrap::get('eu/player/id');
$player = json_decode($response->getBody()->getContents());

// Or using a shortcut
$response = \VGWrap::getData('eu/player/id');
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
