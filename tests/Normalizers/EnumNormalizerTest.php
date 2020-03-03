<?php

namespace W2w\Test\ApieBenSampoEnumPlugin\Normalizers;

use W2w\Lib\Apie\Exceptions\InvalidValueForValueObjectException;
use W2w\Lib\Apie\Plugins\Core\Serializers\SymfonySerializerAdapter;
use W2w\Test\ApieBenSampoEnumPlugin\BaseTestCase;
use W2w\Test\ApieBenSampoEnumPlugin\Mocks\ExampleEnum;

class EnumNormalizerTest extends BaseTestCase
{
    public function testNormalize()
    {
        $apie = $this->createApieWithPlugin();
        $resourceSerializer = $apie->getResourceSerializer();
        if (!($resourceSerializer instanceof SymfonySerializerAdapter)) {
            $this->markTestSkipped('I expect the symfony serializer adapter');
            return;
        }
        $serializer = $resourceSerializer->getSerializer();
        $this->assertEquals(ExampleEnum::CLASS1, $serializer->normalize(ExampleEnum::CLASS1()));
    }

    public function testDenormalize()
    {
        $apie = $this->createApieWithPlugin();
        $resourceSerializer = $apie->getResourceSerializer();
        if (!($resourceSerializer instanceof SymfonySerializerAdapter)) {
            $this->markTestSkipped('I expect the symfony serializer adapter');
            return;
        }
        $serializer = $resourceSerializer->getSerializer();
        $this->assertEquals(ExampleEnum::CLASS1(), $serializer->denormalize(ExampleEnum::CLASS1, ExampleEnum::class));
        $this->assertEquals(ExampleEnum::CLASS1(), $serializer->denormalize('CLASS1', ExampleEnum::class));
    }

    public function testDenormalize_invalid_input()
    {
        $apie = $this->createApieWithPlugin();
        $resourceSerializer = $apie->getResourceSerializer();
        if (!($resourceSerializer instanceof SymfonySerializerAdapter)) {
            $this->markTestSkipped('I expect the symfony serializer adapter');
            return;
        }
        $serializer = $resourceSerializer->getSerializer();

        $this->expectException(InvalidValueForValueObjectException::class);
        $serializer->denormalize('this value is not defined', ExampleEnum::class);
    }
}
