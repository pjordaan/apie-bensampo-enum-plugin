<?php

namespace W2w\Lib\ApieBenSampoEnumPlugin\Schema;

use erasys\OpenApi\Spec\v3\Schema;
use W2w\Lib\Apie\OpenApiSchema\SchemaGenerator;
use W2w\Lib\Apie\PluginInterfaces\DynamicSchemaInterface;

/**
 * Creates Schema for OpenAPI. For POST and PUT key and values can be used. For GET only keys are returned.
 */
class EnumSchemaGenerator implements DynamicSchemaInterface
{
    public function __invoke(
        string $resourceClass,
        string $operation,
        array $groups,
        int $recursion,
        SchemaGenerator $generator
    ) {
        $enumValues = array_values(array_unique($resourceClass::getValues()));
        if ($operation !== 'get') {
            $enumKeys = $resourceClass::getKeys();
            $enumValues =  array_values(array_unique(array_merge($enumValues, $enumKeys)));
        }
        return new Schema(
            [
                'type'    => 'string',
                'enum'    => $enumValues,
                'example' => reset($enumValues) ? : null,
                'default' => reset($enumValues) ? : null
            ]
        );
    }
}
