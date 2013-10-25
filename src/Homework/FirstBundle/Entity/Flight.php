<?php

namespace Homework\FirstBundle\Entity;

/**
 * Class Flight
 * @package Homework\FirstBundle\Entity
 */
class Flight
{

    /** @var integer */
    protected $nbr;
    /** @var string */
    protected $rph;
    /** @var integer */
    protected $marketId;
    /** @var SeatMap */
    protected $seatMap;
    /** @var string */
    protected $departDate;
    /** @var string */
    protected $carrierCode;
    /** @var string */
    protected $origItinerary;

    /**
     * @param string $carrierCode
     */
    public function setCarrierCode($carrierCode)
    {
        $this->carrierCode = $carrierCode;
    }

    /**
     * @return string
     */
    public function getCarrierCode()
    {
        return $this->carrierCode;
    }

    /**
     * @param string $departDate
     */
    public function setDepartDate($departDate)
    {
        $this->departDate = $departDate;
    }

    /**
     * @return string
     */
    public function getDepartDate()
    {
        return $this->departDate;
    }

    /**
     * @param int $flightNumber
     */
    public function setNbr($flightNumber)
    {
        $this->nbr = $flightNumber;
    }

    /**
     * @return int
     */
    public function getNbr()
    {
        return $this->nbr;
    }

    /**
     * @param int $marketId
     */
    public function setMarketId($marketId)
    {
        $this->marketId = $marketId;
    }

    /**
     * @return int
     */
    public function getMarketId()
    {
        return $this->marketId;
    }

    /**
     * @param string $origItinerary
     */
    public function setOrigItinerary($origItinerary)
    {
        $this->origItinerary = $origItinerary;
    }

    /**
     * @return string
     */
    public function getOrigItinerary()
    {
        return $this->origItinerary;
    }

    /**
     * @param string $rph
     */
    public function setRph($rph)
    {
        $this->rph = $rph;
    }

    /**
     * @return string
     */
    public function getRph()
    {
        return $this->rph;
    }

    /**
     * @param $seatMap
     */
    public function setSeatMap($seatMap)
    {
        $this->seatMap = $seatMap;
    }


    /**
     * @return SeatMap
     */
    public function getSeatMap()
    {
        return $this->seatMap;
    }

    /**
     * Returns object as Array
     *
     * @return array
     */
    public function toArray()
    {
        $outputArray = array(
            'nbr' => $this->nbr,
            'rph' => $this->rph,
            'marketId' => $this->marketId,
            'seatMap' => $this->seatMap->toArray(),
            'departDate' => $this->departDate,
            'carrierDate' => $this->carrierCode,
            'origItinerary' => $this->origItinerary,
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
     * @param array $flightArray
     */
    public function buildFromArray(array $flightArray)
    {
        $this->nbr = $flightArray['nbr'];
        $this->rph = $flightArray['rph'];
        $this->marketId = $flightArray['marketID'];
        $this->departDate = $flightArray['departDate'];
        $this->carrierCode = $flightArray['carrierCode'];
        $this->origItinerary = $flightArray['origItinerary'];
        $this->seatMap = new SeatMap();
        $this->seatMap->buildFromArray($flightArray['seatMap'][0]);
    }

}