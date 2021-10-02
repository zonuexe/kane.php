<?php

require_once __DIR__ . '/vendor/autoload.php';

$jpy = Kane\JPY((string)10);
$usd = Kane\USD((string)10);

echo $jpy->add($jpy), PHP_EOL;

/** @psalm-trace $result */
$result = $jpy->add($usd);
