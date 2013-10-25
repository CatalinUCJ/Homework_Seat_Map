<?php


namespace Homework\FirstBundle\Entity\SeatMap;


use
  Homework\FirstBundle\Entity\SeatMap\PriceCompOptCollection\PriceCompOpt;

class PriceCompOptCollection
{
    /** @var PriceCompOpt[] */
    protected $priceCompOptCollections;

    /**
     * @param array $PriceCompOptCollections
     */
    public function setPriceCompOptCollections($PriceCompOptCollections)
    {
        $this->priceCompOptCollections = $PriceCompOptCollections;
    }

    /**
     * @return PriceCompOpt[]
     */
    public function getPriceCompOptCollections()
    {
        return $this->priceCompOptCollections;
    }

    /**
     * @param PriceCompOpt $PriceCompOpt
     */
    public function addPriceCompOpt($PriceCompOpt)
    {
        $this->priceCompOptCollections[] = $PriceCompOpt;
    }

    /**
     * Returns object as Array.
     *
     * @return array
     */
    public function toArray()
    {
        $outputArray = array();

        foreach ($this->priceCompOptCollections as $priceCompOptCol) {
            /* @var $priceCompOptCol PriceCompOptCollection */
            $outputArray[] = $priceCompOptCol->toArray();
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
     * @param array $priceCompOptCollectionsArray
     */
    public function buildFromArray(array $priceCompOptCollectionsArray)
    {
        foreach ($priceCompOptCollectionsArray as $priceCompOptCollectionArray) {
            $priceComp = new PriceCompOpt();
            $priceComp->buildFromArray($priceCompOptCollectionArray);
            $this->addPriceCompOpt($priceComp);
        }

    }

}