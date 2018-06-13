# Blade class names

[![Build Status](https://travis-ci.org/tautvydasr/blade-class-names.svg?branch=master)](https://travis-ci.org/tautvydasr/blade-class-names)

Simple package which helps to handle conditional html classes in blade templates.  

## Installation

First of all require this package in composer:

```bash
composer require tautvydasr/blade-class-names
```

Finally, add service provider to `providers` array in your `config/app.php` file:

```php
'providers' => [
    // ...
    ClassNames\ClassNamesServiceProvider::class,
    // ...
],
```

## Usage

Basically package allows you to simplify conditional classes situations like this

```blade
<a href="#" class="menu-item{{ $loop->first ? ' first-item' : '' }}{{ request()->routeIs('foo') ? ' active' : '' }}">
    ...
</a>
``` 

to this using blade directive `@classNames()`

```blade
<a href="#" class="@classNames('menu-item', ['first-item' => $loop->first, 'active' => request()->routeIs('foo')])">
    ...
</a>
``` 

## Local setup

Copy example docker compose config file (optional):  

```bash
cp docker-compose.yml.dist docker-compose.yml
```

Run docker containers (optional):

```bash
docker-compose up -d
```

Login to docker container where `CONTAINER_ID` is your id (optional):

```bash
docker exec -ti CONTAINER_ID /bin/bash
```

Install dependencies using composer:

```bash
composer install
```

## Tests

Run phpunit tests:

```bash
./vendor/bin/phpunit
```

## License

Package is free to use and is licensed under the [MIT license](http://www.opensource.org/licenses/mit-license.php)
