# Bit.ly PHP api wrapper
The Bit.ly name is trademark of Bit.ly!

Simple PHP wrapper for the [Bit.ly](https://bitly.com/) API V4.

**If you like this project, star it!**

[![Total Downloads](https://poser.pugx.org/sineverba/bitly-php-api-wrapper/downloads)](https://packagist.org/packages/sineverba/bitly-php-api-wrapper)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/sineverba/bitly-php-api-wrapper/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/sineverba/bitly-php-api-wrapper/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/sineverba/bitly-php-api-wrapper/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/sineverba/bitly-php-api-wrapper/?branch=master) [![Build Status](https://scrutinizer-ci.com/g/sineverba/bitly-php-api-wrapper/badges/build.png?b=master)](https://scrutinizer-ci.com/g/sineverba/bitly-php-api-wrapper/build-status/master) [![Build Status](https://travis-ci.com/sineverba/bitly-php-api-wrapper.svg?branch=master)](https://travis-ci.com/sineverba/bitly-php-api-wrapper) [![codecov](https://codecov.io/gh/sineverba/bitly-php-api-wrapper/branch/master/graph/badge.svg)](https://codecov.io/gh/sineverba/bitly-php-api-wrapper) [![StyleCI](https://github.styleci.io/repos/164450893/shield?branch=master)](https://github.styleci.io/repos/164450893) [![Coverage Status](https://coveralls.io/repos/github/sineverba/bitly-php-api-wrapper/badge.svg?branch=master)](https://coveralls.io/github/sineverba/bitly-php-api-wrapper?branch=master) [![CircleCI](https://circleci.com/gh/sineverba/bitly-php-api-wrapper/tree/master.svg?style=svg)](https://circleci.com/gh/sineverba/bitly-php-api-wrapper/tree/master)

## Docker development

I use Docker images (PHP 5.6, PHP 7.0 and PHP 7.4) to develop (see `docker-compose.yaml`).

Change developXY with PHP version you want use.

``` bash
$ docker-compose build develop70
$ docker-compose up -d develop70
$ docker-compose exec develop70 rm -r vendor
$ docker-compose exec develop70 rm composer.lock
$ docker-compose exec develop70 composer install
$ docker-compose exec develop70 composer test
$ docker-compose stop
```

To run with your own user/id, uncomment relative sections on `docker-compose.yaml` and run it with these commands

``` bash

$ CURRENT_USER=$(whoami) CURRENT_UID=$(id -u) docker-compose build develop56
$ CURRENT_USER=$(whoami) CURRENT_UID=$(id -u) docker-compose run --rm develop56
```


## Install

```php 
$ composer require sineverba/bitly-php-api-wrapper
```

## Usage

+ Get your **Generic Access Token** from [Bit.ly](https://bitly.com/). See also [https://support.bitly.com/hc/en-us/articles/230647907-How-do-I-find-my-OAuth-access-token-](https://support.bitly.com/hc/en-us/articles/230647907-How-do-I-find-my-OAuth-access-token-)

```php
<?php

require_once ('vendor/autoload.php');

use Bitlywrap\Auth\Auth;
use Bitlywrap\Adapter\Adapter;
use Bitlywrap\Wrapper\Wrapper;

$token = 'your_generic_access_token';

$auth = new Auth($token);
$adapter = new Adapter($auth);
$wrapper = new Wrapper($adapter);

$long_url = 'http://www.example.com';

$short_url = $wrapper->getShortLink($long_url);

echo $short_url; // http://bit.ly/2HzJUKT

```

## Contributions

Contributions are **welcome** and will be fully **credited**.