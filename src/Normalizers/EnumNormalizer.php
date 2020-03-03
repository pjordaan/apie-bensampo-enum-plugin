<?php

namespace W2w\Lib\ApieBenSampoEnumPlugin\Normalizers;

use BenSampo\Enum\Enum;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use W2w\Lib\Apie\Exceptions\InvalidValueForValueObjectException;

class EnumNormalizer implements NormalizerInterface, DenormalizerInterface
{
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $result = $class::coerce($data);
        if (!$result) {
            throw new InvalidValueForValueObjectException($data, $class);
        }
        return $result;
    }

    public function supportsDenormalization($data, $type, $format = null)
    {
        return is_a($type, Enum::class, true);
    }

    public function normalize($object, $format = null, array $context = [])
    {
        /** @var Enum $object */
        return $object->value;
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof Enum;
    }
}
