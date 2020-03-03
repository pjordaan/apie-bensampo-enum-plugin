<?php

namespace W2w\Test\ApieBenSampoEnumPlugin;

use erasys\OpenApi\Spec\v3\Schema;
use W2w\Test\ApieBenSampoEnumPlugin\Mocks\EmptyEnum;
use W2w\Test\ApieBenSampoEnumPlugin\Mocks\ExampleEnum;

class BenSampoEnumPluginTest extends BaseTestCase
{
    public function testSchema_empty_enum()
    {
        $apie = $this->createApieWithPlugin();
        $schemaGenerator = $apie->getSchemaGenerator();
        $expected = new Schema(
            [
                'type' => 'string',
                'enum' => [
                ],
                'default' => null,
                'example' => null,
            ]
        );

        $this->assertEquals(
            $expected,
            $schemaGenerator->createSchema(EmptyEnum::class, 'get', ['read', 'get'])
        );
        $this->assertEquals(
            $expected,
            $schemaGenerator->createSchema(EmptyEnum::class, 'post', ['write', 'post'])
        );
    }

    public function testSchema_properly_generated()
    {
        $apie = $this->createApieWithPlugin();
        $schemaGenerator = $apie->getSchemaGenerator();
        $expected = new Schema(
            [
                'type' => 'string',
                'enum' => [
                    'one',
                    'two',
                    'three'
                ],
                'default' => 'one',
                'example' => 'one',
            ]
        );

        $this->assertEquals(
            $expected,
            $schemaGenerator->createSchema(ExampleEnum::class, 'get', ['read', 'get'])
        );

        $expected = new Schema(
            [
                'type' => 'string',
                'enum' => [
                    'one',
                    'two',
                    'three',
                    'CLASS1',
                    'CLASS2',
                    'CLASS3',
                ],
                'default' => 'one',
                'example' => 'one',
            ]
        );

        $this->assertEquals(
            $expected,
            $schemaGenerator->createSchema(ExampleEnum::class, 'post', ['write', 'post'])
        );
    }
}
