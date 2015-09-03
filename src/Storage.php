<?php

namespace Shadowhand\Destrukt;

trait Storage
{
    /**
     * @var array
     */
    private $data = [];

    // StructInterface
    abstract public function validate(array $array);

    /**
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        if ($data) {
            $this->validate($data);
            $this->data = $data;
        }
    }

    /**
     * Get a copy of the stored data.
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get a copy with new stored data.
     *
     * @param  array $data
     * @return self
     */
    public function withData(array $data)
    {
        $this->validate($data);

        $copy = clone $this;
        $copy->data = $data;

        return $copy;
    }

    // StructInterface
    public function toArray()
    {
        return $this->getData();
    }

    // Countable
    public function count()
    {
        return count($this->data);
    }

    /**
     * Get JSON encoding options.
     *
     * @return integer
     */
    private function jsonOptions()
    {
        return 0;
    }

    // JsonSerializable
    public function jsonSerialize()
    {
        return json_encode($this->toArray(), $this->jsonOptions());
    }

    // Serializable
    public function serialize()
    {
        return $this->jsonSerialize();
    }

    // Serializable
    public function unserialize($data)
    {
        $data = json_decode($data, true);

        $this->validate($data);

        $this->data = $data;
    }
}
