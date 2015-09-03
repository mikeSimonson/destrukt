<?php

namespace Shadowhand\Destrukt;

class HashStruct implements StructInterface
{
    use Storage;

    public function validate(array $data)
    {
        if (array_keys($data) === array_keys(array_values($data))) {
            throw new \InvalidArgumentException(
                'Hash structures must be indexed by keys'
            );
        }
    }

    public function getValue($key, $default = null)
    {
        if (isset($this->data[$key])) {
            return $this->data[$key];
        }
        return $default;
    }

    public function withValue($key, $value)
    {
        $copy = clone $this;
        $copy->data[$key] = $value;

        return $copy;
    }
}
