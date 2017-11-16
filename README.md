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

// Instantiate
$money = new Money(123, Currency::usd());

// Get values
$money->amount() === 123; // => true
$money->currency()->equals(Currency::usd()); // true

// Compare moneys
$money->equals(new Money(123, Currency::usd()); // => true
$money->equals(new Money(321, Currency::usd()); // => false
$money->equals(new Money(123, Currency::jpy()); // => false

// Duplicate
$duplicatedMoney = $money->duplicate();
$duplicatedMoney->equals($money); // => true

// Add
$money = new Money(123, Currency::usd());
$addedMoney = $money->add(321, Currency::usd());
$money->amount() === 123; // => true (No side effect)
$addedMoney->amount() === 444; // => true

// Subtract
$money = new Money(321, Currency::usd());
$subbedMoney = $money->sub(123, Currency::usd());
$money->amount() === 321; // => true (No side effect)
$subbedMoney->amount() === 198; // => true

// Multiply
$money = new Money(321, Currency::usd());
$multipliedMoney = $money->multiply(1.5);
$money->amount() === 321; // => true (No side effect)
$multipliedMoney->amount() === 481; // => true

// Increase amount
$money = $money = new Money(123, Currency::usd());
$increasedMoney = $money->increaseAmountBy(111);
$money->amount() === 123; // => true (No side effect)
$increasedMoney->amount() === 234; // => true

// Decrease amount
$money = $money = new Money(123, Currency::usd());
$decreasedMoney = $money->decreasedAmountBy(111);
$money->amount() === 123; // => true (No side effect)
$decreasedMoney->amount() === 12; // => true
```


