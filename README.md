PHP Wrapper for Bit.ly API V4
=========================

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/sineverba/bitly-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/sineverba/bitly-php/?branch=master)

[![Code Coverage](https://scrutinizer-ci.com/g/sineverba/bitly-php/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/sineverba/bitly-php/?branch=master)

[![Build Status](https://scrutinizer-ci.com/g/sineverba/bitly-php/badges/build.png?b=master)](https://scrutinizer-ci.com/g/sineverba/bitly-php/build-status/master)

[![Build Status](https://travis-ci.org/sineverba/bitly-php.svg?branch=master)](https://travis-ci.org/sineverba/bitly-php)

[![StyleCI](https://github.styleci.io/repos/164450893/shield?branch=master)](https://github.styleci.io/repos/164450893)

[![CodeCov](https://codecov.io/gh/sineverba/bitly-php/branch/master/graph/badge.svg)](https://codecov.io/gh/sineverba/bitly-php)

A easy-to-use class to create short link via Bit.ly API V4.

The Bit.ly name is trademark of Bit.ly!

## Setup
```
composer require sineverba/bitly
```
## Usage
First, you need to grab your generic access token from Bit.ly web app.

```
$bitly = new \sineverba\Bitly\Bitly(YOUR_TOKEN_HERE);
$bitly->createShortLink("http://www.example.com");
$url = $bitly->getShortUrl();
``` 

## Contributing
All contributions are welcome! See CONTRIBUTING.md