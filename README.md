b2rPHP: SimpleDump
==================

Simple `var_dump` wrapper

[![Build Status](https://travis-ci.org/b2r/php-simple-dump.svg?branch=master)](https://travis-ci.org/b2r/php-simple-dump)

- [CHANGELOG](CHANGELOG.md)

## Summary
- Minify `var_dump` result
- Register `p` global function : `function($value...): void` echo dump result
- Register `ps` global function : `function($value...): string` get dump string

## Usage
```php
use b2r\Component\SimpleDump\SimpleDump;

// get as string
$server = SimpleDump::dump($_SERVER);

// echo
SimpleDump::display($_SERVER);

// Register global function `p` and `ps`
SimpleDump::init();

// get as string
$server = ps($_SERVER);

// echo
p($_SERVER);
```

## Comparison
```php
// Register global function `p` and `ps`
b2r\Component\SimpleDump\SimpleDump::init();

# Store
$value = [
    'string' => 'string',
    'int'    => 1,
    'float'  => 1.0,
    'true'   => true,
    'false'  => false,
    'null'   => null,
];
$value['object'] = (object)$value;

# Echo
echo "------------------------------------------------------------\n";
p($value);
echo "------------------------------------------------------------\n";
var_dump($value);
```
**result**
```
------------------------------------------------------------
array(7) {
  ["string"]=> string(6) "string"
  ["int"]=> int(1)
  ["float"]=> float(1)
  ["true"]=> bool(true)
  ["false"]=> bool(false)
  ["null"]=> NULL
  ["object"]=> object(stdClass)#3 (6) {
    ["string"]=> string(6) "string"
    ["int"]=> int(1)
    ["float"]=> float(1)
    ["true"]=> bool(true)
    ["false"]=> bool(false)
    ["null"]=> NULL
  }
}
------------------------------------------------------------
array(7) {
  ["string"]=>
  string(6) "string"
  ["int"]=>
  int(1)
  ["float"]=>
  float(1)
  ["true"]=>
  bool(true)
  ["false"]=>
  bool(false)
  ["null"]=>
  NULL
  ["object"]=>
  object(stdClass)#3 (6) {
    ["string"]=>
    string(6) "string"
    ["int"]=>
    int(1)
    ["float"]=>
    float(1)
    ["true"]=>
    bool(true)
    ["false"]=>
    bool(false)
    ["null"]=>
    NULL
  }
}
```
