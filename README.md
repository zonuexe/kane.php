# 🤑 kane.php 🤑

PHPで金額計算をするためのクラスです。

> Idol time is money!!

## メイクマネー

```php
$十円 = Kane\JPY(10);
$二十円 = Kane\JPY(20);

echo $十円->add($二十円), PHP_EOL;
// "30.0000000000"
```

## Kane\Money::eval()

```php
<?php

$moneys = [Kane\JPY(1000), Kane\JPY(2000), Kane\JPY(3000)];
// こう書いても同じ
// $moneys = array_map('Kane\JPY', [1000, 2000, 3000]);
$sum = Kane\Money::eval('+', ...$moneys);
var_dump((string)$sum);
// "6000.0000000000"

// 計算式 (10 + 20) * 30
(string)Kane\Money::eval('*', ['+', Kane\JPY(10), Kane\JPY(20)], Kane\JPY(30));
// "900.0000000000"
```
