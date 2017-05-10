<?php

include('vendor/autoload.php');

$key = "dG9zaHlyb25ldC53ZWI6MzVOYm5XZDBFSQ==";

$zenvia = new \Smolareck\Zenvia\Zenvia($key);
$zenvia->setFrom("Carlos");
$zenvia->setNumber("5551992933065");
$zenvia->setMessage("AEEEEEEEE");
$ret = $zenvia->send();

var_dump($ret);