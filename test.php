<?php

require 'vendor/autoload.php';
include_once 'api.php';

$bitly = new \sineverba\Bitly\Bitly(TOKEN);
$bitly->createShortLink("https://www.google.it");
$url = $bitly->getShortUrl();

var_dump($url);