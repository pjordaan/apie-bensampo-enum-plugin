# apie-bensampo-enum-plugin
Adds enum support created with [bensampo/laravel-enum](https://github.com/BenSampo/laravel-enum) to apie with a proper OpenAPI specifcation.

[![CircleCI](https://circleci.com/gh/pjordaan/apie-bensampo-enum-plugin.svg?style=svg)](https://circleci.com/gh/pjordaan/apie-bensampo-enum-plugin)
[![codecov](https://codecov.io/gh/pjordaan/apie-bensampo-enum-plugin/branch/master/graph/badge.svg)](https://codecov.io/gh/pjordaan/apie-bensampo-enum-plugin/)
[![Travis](https://api.travis-ci.org/pjordaan/apie-bensampo-enum-plugin.svg?branch=master)](https://travis-ci.org/pjordaan/apie-bensampo-enum-plugin)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/pjordaan/apie-bensampo-enum-plugin/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/pjordaan/apie-bensampo-enum-plugin/?branch=master)

## how to use:
Add W2w\Lib\ApieBenSampoEnumPlugin\BenSampoEnumPlugin to the list of Apie plugins you want to add and you will have full support for enums created with bensampo/laravel-enum.
```php
<?php
//config/apie.php:
use W2w\Lib\ApieBenSampoEnumPlugin\BenSampoEnumPlugin;
return [
    'plugins' => [BenSampoEnumPlugin::class],
];
```

## Localization strings
The localization strings for enums are not used. In case you want to localize this, you require to make your own normalizer.
