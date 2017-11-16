Money
=======================


A value object representing money and currencies in PHP.

## Installation

```
composer require tanigami/money
```

## Usage

```php
<?php

use Tanigami\Money\Currency;
use Tanigami\Money\Money;

// Instantiate via factory methods
$money = new Money(123.45, Currency::usd());

// Compare moneys
$money->equals(new Money(123.45, Currency::usd()); // => true
$money->equals(new Money(543.21, Currency::usd()); // => false
$money->equals(new Money(123.45, Currency::jpy()); // => false

// Duplicate
$duplicatedMoney = $money->duplicate();
$duplicatedMoney->equals($money); // => true
```


