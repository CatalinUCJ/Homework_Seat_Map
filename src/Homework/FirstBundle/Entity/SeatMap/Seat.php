<?php


namespace Homework\FirstBundle\Entity\SeatMap;

use Homework\FirstBundle\Entity\SeatMap\PriceCompOptCollection\PriceCompOpt;
use Homework\FirstBundle\Entity\SeatMap\priceCompOptCollection;
/**
 * Class Seat
 * @package Homework\FirstBundle\Entity\SeatMap
 */
class Seat
{
    /** @var  string */
    protected $size;
    /** @var string */
    protected $row;
    /** @var string */
    protected $position;
    /** @var string */
    protected $col;
    /** @var string */
    protected $cabinCode;
    /** @var string */
    protected $adjacentInfo;
    /** @var string */
    protected $restriction;
    /** @var boolean */
    protected $isExitRow;
    /** @var boolean */
    protected $isAvailable;
    /** @var priceCompOptCollection */
    protected $priceComponentsOptional;

    /**
     * @param string $adjacentInfo
     */
    public function setAdjacentInfo($adjacentInfo)
    {
        $this->adjacentInfo = $adjacentInfo;
    }

    /**
     * @return string
     */
    public function getAdjacentInfo()
    {
        return $this->adjacentInfo;
    }

    /**
     * @param string $cabinCode
     */
    public function setCabinCode($cabinCode)
    {
        $this->cabinCode = $cabinCode;
    }

    /**
     * @return string
     */
    public function getCabinCode()
    {
        return $this->cabinCode;
    }

    /**
     * @param string $col
     */
    public function setCol($col)
    {
        $this->col = $col;
    }

    /**
     * @return string
     */
    public function getCol()
    {
        return $this->col;
    }

    /**
     * @param boolean $isAvailable
     */
    public function setIsAvailable($isAvailable)
    {
        $this->isAvailable = $isAvailable;
    }

    /**
     * @return boolean
     */
    public function getIsAvailable()
    {
        return $this->isAvailable;
    }

    /**
     * @param boolean $isExitRow
     */
    public function setIsExitRow($isExitRow)
    {
        $this->isExitRow = $isExitRow;
    }

    /**
     * @return boolean
     */
    public function getIsExitRow()
    {
        return $this->isExitRow;
    }

    /**
     * @param string $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param PriceCompOptCollection $priceComponentsOptional
     */
    public function setPriceComponentsOptional($priceComponentsOptional)
    {
        $this->priceComponentsOptional = $priceComponentsOptional;
    }

    /**
     * @return PriceCompOptCollection
     */
    public function getPriceComponentsOptional()
    {
        return $this->priceComponentsOptional;
    }

    /**
     * @param string $restriction
     */
    public function setRestriction($restriction)
    {
        $this->restriction = $restriction;
    }

    /**
     * @return string
     */
    public function getRestriction()
    {
        return $this->restriction;
    }

    /**
     * @param string $row
     */
    public function setRow($row)
    {
        $this->row = $row;
    }

    /**
     * @return string
     */
    public function getRow()
    {
        return $this->row;
    }

    /**
     * @param string $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Returns object as Array.
     *
     * @return array
     */
    public function toArray()
    {
        $outputArray = array(
            'size' => $this->size,
            'row' => $this->row,
            'position' => $this->position,
            'col' => $this->col,
            'cabinCode' => $this->cabinCode,
            'adiacentInfo' => $this->adjacentInfo,
            'restriction' => $this->restriction,
            'isExitRow' => $this->isExitRow,
            'isAvailable' => $this->isAvailable,
            'priceComponentsOptional' => $this->priceComponentsOptional->toArray(),
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
     * @param array $seatArray
     */
    public function buildFromArray(array $seatArray)
    {
        $this->size = $seatArray['size'];
        $this->row = $seatArray['row'];
        $this->position = $seatArray['position'];
        $this->col = $seatArray['col'];
        $this->cabinCode = $seatArray['cabinCode'];
        $this->adjacentInfo = $seatArray['adjacentInfo'];
        $this->isExitRow = $seatArray['isExitRow'];
        $this->isAvailable = $seatArray['isAvailable'];
        $this->priceComponentsOptional = new PriceCompOptCollection();
        foreach ($seatArray['priceComponentOptional'] as $priceCompOptArray) {
            $priceCompOpt = new PriceCompOpt();
            $priceCompOpt->buildFromArray($priceCompOptArray);
            $this->priceComponentsOptional->addPriceCompOpt($priceCompOpt);
        }
    }

}