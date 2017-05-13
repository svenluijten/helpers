![helpers](https://cloud.githubusercontent.com/assets/11269635/23331282/fc1f9b66-fb62-11e6-953d-19d813ea39ef.jpg)

# Package

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Code Climate][ico-codeclimate]][link-codeclimate]
[![Code Quality][ico-quality]][link-quality]
[![SensioLabs Insight][ico-insight]][link-insight]
[![StyleCI][ico-styleci]][link-styleci]

This is a collection of useful helpers for use in Laravel applications. Mainly
made for personal use, but if you find (some of) the helpers useful, feel free
to use it!

## Installation
Via [composer](http://getcomposer.org):

```bash
$ composer require sven/helpers
```

Or add the package to your dependencies in `composer.json` and run
`composer install` on the command line to download the package:

```json
{
    "require": {
        "sven/helpers": "^1.0"
    }
}
```

## Available functions
All available functions are listed here, along with their usage and an example on how I would use them.

### active_route
This function will return `true` if you're on the given route name, `false` otherwise:  

```php
$isHome = active_route('home');
```

You may also pass in optional `$positive` or `$negative` values to return:

```php
$isContact = active_route('contact', 'Yes!', 'No :(');
```

There is also an option to give it an array of multiple route names instead of just one. The function will
return `$positive` if the current route matches any of the given ones, `$negative` otherwise:

```php
$isContactOrAbout = active_route(['contact', 'about']);
```

`active_route()` can be tremendously useful for `active` states on for instance navigation in blade templates:

```blade
<nav>
    <ul>
        <li class="{{ active_route('home', 'active', null) }}">
            <a href="{{ route('home') }}">Home</a>
        </li>
        <li class="{{ active_route('contact', 'active', null) }}">
            <a href="{{ route('contact') }}">Contact</a>
        </li>
        <li class="{{ active_route('about', 'active', null) }}">
            <a href="{{ route('about') }}}">About</a>
        </li>
    </ul>
</nav>
```

### str_possessive
This function will return the possessive form of a subject string you give it:

```php
echo str_possessive('Brian') . ' house.'; // "Brian's house."
```

It will only append an apostrophe (without the trailing `s`) if the given subject ends
in `s`, `z` or `ch`:

```php
echo str_possessive('Dolores') . ' eyes.'; // "Dolores' eyes."
echo str_possessive('Sanchez') . ' shoes.'; // "Sanchez' shoes."
echo str_possessive('Gretch') . ' plate.'; // Gretch' plate."
```

## Contributing
All contributions (pull requests, issues and feature requests) are
welcome. Make sure to read through the [CONTRIBUTING.md](CONTRIBUTING.md) first,
though. See the [contributors page](../../graphs/contributors) for all contributors.

## License
`sven/helpers` is licensed under the MIT License (MIT). Please see the
[license file](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/sven/helpers.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-green.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/sven/helpers.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/svenluijten/helpers.svg?style=flat-square
[ico-codeclimate]: https://img.shields.io/codeclimate/github/svenluijten/helpers.svg?style=flat-square
[ico-quality]: https://img.shields.io/scrutinizer/g/svenluijten/helpers.svg?style=flat-square
[ico-insight]: https://img.shields.io/sensiolabs/i/07542093-e5a4-40a1-8279-5d7c1ff4fda6.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/83132069/shield

[link-packagist]: https://packagist.org/packages/sven/helpers
[link-downloads]: https://packagist.org/packages/sven/helpers
[link-travis]: https://travis-ci.org/svenluijten/helpers
[link-codeclimate]: https://codeclimate.com/github/svenluijten/helpers
[link-quality]: https://scrutinizer-ci.com/g/svenluijten/helpers/?branch=master
[link-insight]: https://insight.sensiolabs.com/projects/07542093-e5a4-40a1-8279-5d7c1ff4fda6
[link-styleci]: https://styleci.io/repos/83132069
