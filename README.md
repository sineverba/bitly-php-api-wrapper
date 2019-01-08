PHP Wrapper for Bit.ly API V4
=========================

The Bit.ly name is trademark of Bit.ly!

## Setup
Better use with `composer`.

TODO: setup with composer


## Usage
- Get your own token inside web app

```
<?php

use ...

$token = "your_supersecret_token";
$bitly = new ....\Bitly($token);
$bitly->createShortLink("https://www.google.com");

$short_url = $bitly->getShortUrl();

```

## Test
- Create new file called "api.php"
- Paste inside

```$xslt
<?php

define("TOKEN","your_supersecret_token");
```