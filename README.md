HTTP Methods in PHP
=======================
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/tanigami/http-method-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/tanigami/http-method-php/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/tanigami/http-method-php/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/tanigami/http-method-php/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/tanigami/http-method-php/badges/build.png?b=master)](https://scrutinizer-ci.com/g/tanigami/http-method-php/build-status/master)

A value object representing HTTP methods in PHP.

- GET
- HEAD
- POST 
- PUT
- DELETE
- CONNECT
- OPTIONS
- TRACE
- PATCH

## Installation

```
composer require tanigami/http-method-php
```

## Usage

```php
<?php

use Tanigami\HttpMethod\HttpMethod;

// Instantiate via factory methods
HttpMethod::get();

// Compare objects
HttpMethod::get()->equals(HttpMethod::get()); // => true
HttpMethod::get()->equals(HttpMethod::post()); // => false

// Get string representation
HttpMethod::get()->toString(); // => 'GET'
```


