PHP Wrapper for Bit.ly API V4
=========================

The Bit.ly name is trademark of Bit.ly!

## Setup
Better use with `composer`.

```
composer require sineverba/bitly
```


## Usage
- Get your own token inside web app

```
<?php

$token = "your_supersecret_token";
$bitly = new \sineverba\Bitly\Bitly($token);
$bitly->createShortLink("https://www.example.com");
$url = $bitly->getShortUrl();

```

## Test
- Create new file called "api.php"
- Paste inside

```
<?php

define("TOKEN","your_supersecret_token");
```
- Run `test.php`