<?php

require 'vendor/autoload.php';
use Bitlywrap\Auth\Auth;
$token = '9e08ad0d465fda74e16b7375882d0b3ca186c0a4';

$auth = new Auth($token);
$adapter = new \Bitlywrap\Adapter\Adapter($auth);

var_dump($adapter);