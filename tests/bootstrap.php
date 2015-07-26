<?php

$loader = require __DIR__ . '/../vendor/autoload.php';
$loader->add('Pekkis\\DirectoryCalculator\\Tests\\', __DIR__);

gc_enable();

error_reporting(E_ALL ^ E_USER_DEPRECATED);
