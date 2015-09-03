<?php

namespace Shadowhand\Destrukt;

class ListStruct implements StructInterface
{
    use Storage;

    public function validate(array $data)
    {
        if (array_values($data) !== $data) {
            throw new \InvalidArgumentException(
                'List structures cannot be indexed by keys'
            );
        }
    }

    public function withValue($value)
    {
        $copy = clone $this;
        $copy->data[] = $value;

        return $copy;
    }
}
