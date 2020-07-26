<?php

require './vendor/autoload.php';

use Broadcast\Company;
use Broadcast\Platform;

$company = new Company();

$pchome = new Platform('PChome');
$shopee = new Platform('Shopee');

// 附加
$company->attach($pchome);
$company->attach($shopee);
$company->notify();

echo('脫離 pchome .....') . PHP_EOL;
$company->detach($pchome);
$company->notify();