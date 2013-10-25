<?php


namespace Homework\FirstBundle\Entity\SeatMap\PriceCompOptCollection\PropertyCollection;


class Property
{
    /** @var string */
    protected $name;
    /** @var string */
    protected $value;

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Returns object as Array.
     *
     * @return array
     */
    public function toArray()
    {
        $outputArray = array(
            'name' => $this->name,
            'value' => $this->value,
        );

        return $outputArray;
    }

    /**
     * Returns object as JSON object.
     *
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }

    /**
     * Builds object from Array.
     *
     * @param array $propertyArray
     */
    public function buildFromArray(array $propertyArray)
    {
        $this->name = $propertyArray['name'];
        $this->value = $propertyArray['value'];
    }

}