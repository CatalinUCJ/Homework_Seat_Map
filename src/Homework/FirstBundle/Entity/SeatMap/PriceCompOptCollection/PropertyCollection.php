<?php


namespace Homework\FirstBundle\Entity\SeatMap\PriceCompOptCollection;

use
  Homework\FirstBundle\Entity\SeatMap\PriceCompOptCollection\PropertyCollection\Property;

class PropertyCollection
{
    /** @var Property[] */
    protected $properties;

    /**
     * @param array $properties
     */
    public function setProperties($properties)
    {
        $this->properties = $properties;
    }

    /**
     * @return Property[]
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @param Property $property
     */
    public function addProperty($property)
    {
        $this->properties[] = $property;
    }

    /**
     * Returns object as Array.
     *
     * @return array
     */
    public function toArray()
    {
        $outputArray = array();
        if (is_array($this->properties)) {
            foreach ($this->properties as $property) {
                /* @var $property Property */
                $outputArray[] = $property->toArray();
            }
        }

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
     * @param array $propertiesArray
     */
    public function buildFromArray(array $propertiesArray)
    {
        foreach ($propertiesArray as $propertyArray) {
            $property = new Property();
            $property->buildFromArray($propertyArray);
            $this->addProperty($property);
        }
    }

}