<?php


namespace Homework\FirstBundle\Entity\SeatMap\PriceCompOptCollection;

use Homework\FirstBundle\Entity\SeatMap\PriceCompOptCollection\PropertyCollection;


class PriceCompOpt
{
    /** @var PropertyCollection */
    protected $properties;

    /** @var integer */
    protected $value;

    /** @var string */
    protected $description;

    /** @var string */
    protected $source;

    /** @var string */
    protected $code;

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param PropertyCollection $properties
     */
    public function setProperties($properties)
    {
        $this->properties = $properties;
    }

    /**
     * @return PropertyCollection
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param int $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return int
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
            'properties' => $this->properties->toArray(),
            'value' => $this->value,
            'description' => $this->description,
            'source' => $this->source,
            'code' => $this->code,
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
     * @param array $PriceCompOptArray
     */
    public function buildFromArray(array $PriceCompOptArray)
    {
        $this->properties = new PropertyCollection();
        $this->properties->buildFromArray($PriceCompOptArray['property']);

        $this->value = $PriceCompOptArray['value'];

        $this->description = $PriceCompOptArray['description'];

        $this->source = $PriceCompOptArray['source'];

        $this->code = $PriceCompOptArray['code'];
    }

}