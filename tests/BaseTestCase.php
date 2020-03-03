<?php


namespace W2w\Test\ApieBenSampoEnumPlugin;

use PHPUnit\Framework\TestCase;
use W2w\Lib\Apie\Apie;
use W2w\Lib\ApieBenSampoEnumPlugin\BenSampoEnumPlugin;

abstract class BaseTestCase extends TestCase
{
    final protected function createApieWithPlugin(): Apie
    {
        return new Apie([new BenSampoEnumPlugin()], true, null);
    }
}
