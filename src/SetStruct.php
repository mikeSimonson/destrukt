<?php

namespace Shadowhand\Destrukt;

class SetStruct extends ListStruct
{
    public function validate(array $data)
    {
        parent::validate($data);

        if (array_unique($data) !== $data) {
            throw new \InvalidArgumentException(
                'Set structures must contain only unique values'
            );
        }
    }

    public function withValue($value)
    {
        if (in_array($value, $this->toArray())) {
            throw new \UnexpectedValueException(
                'Set already contains the given value'
            );
        }

        return parent::withValue($value);
    }
}
