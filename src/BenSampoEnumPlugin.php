<?php

namespace W2w\Lib\ApieBenSampoEnumPlugin;

use BenSampo\Enum\Enum;
use erasys\OpenApi\Spec\v3\Schema;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use W2w\Lib\Apie\PluginInterfaces\NormalizerProviderInterface;
use W2w\Lib\Apie\PluginInterfaces\SchemaProviderInterface;
use W2w\Lib\ApieBenSampoEnumPlugin\Schema\EnumSchemaGenerator;
use W2w\Lib\ApieBenSampoEnumPlugin\Normalizers\EnumNormalizer;

class BenSampoEnumPlugin implements SchemaProviderInterface, NormalizerProviderInterface
{
    /**
     * @return NormalizerInterface[]|DenormalizerInterface[]
     */
    public function getNormalizers(): array
    {
        return [new EnumNormalizer()];
    }

    /**
     * @return Schema[]
     */
    public function getDefinedStaticData(): array
    {
        return [];
    }

    /**
     * @return callable[]
     */
    public function getDynamicSchemaLogic(): array
    {
        return [
            Enum::class => new EnumSchemaGenerator()
        ];
    }
}
