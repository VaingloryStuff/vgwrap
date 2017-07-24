# vgwrap

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A Laravel wrapper for the Vainglory API

## Structure

Some shitty structure.

```
config/
src/
tests/
vendor/
```


## Install

Via Composer

``` bash
$ composer require agangofkittens/vgwrap
```

## Usage

``` php
$params = [
	'region' => 'eu',
	'name' => 'Adrame'
];
$response = VGWrap::getPlayerByName($params);
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
[ico-travis]: https://img.shields.io/travis/agangofkittens/vgwrap/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/agangofkittens/vgwrap.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/agangofkittens/vgwrap.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/agangofkittens/vgwrap.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/agangofkittens/vgwrap
[link-travis]: https://travis-ci.org/agangofkittens/vgwrap
[link-scrutinizer]: https://scrutinizer-ci.com/g/agangofkittens/vgwrap/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/agangofkittens/vgwrap
[link-downloads]: https://packagist.org/packages/agangofkittens/vgwrap
[link-author]: https://github.com/agangofkittens
[link-contributors]: ../../contributors
