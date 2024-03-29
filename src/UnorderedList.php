<?php

namespace Shadowhand\Destrukt;

use Shadowhand\Destrukt\Ability;

class UnorderedList implements StructInterface
{
    use Ability\Storage;
    use Ability\ValueStorage;

    public function validate(array $data)
    {
        if (array_values($data) !== $data) {
            throw new \InvalidArgumentException(
                'List structures cannot be indexed by keys'
            );
        }
    }
}
