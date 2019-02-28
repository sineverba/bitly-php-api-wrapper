PHP Wrapper for Bit.ly API V4
=========================

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