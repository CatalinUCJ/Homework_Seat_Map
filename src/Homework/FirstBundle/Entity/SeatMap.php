<?php


namespace Homework\FirstBundle\Entity;

use Homework\FirstBundle\Entity\SeatMap\Seat;

/**
 * Class SeatMap
 * @package Homework\FirstBundle\Entity
 */
class SeatMap
{

    /** @var integer */
    protected $numRows;
    /** @var integer */
    protected $numCols;
    /** @var integer */
    protected $firstRow;
    /** @var integer */
    protected $lastRow;
    /** @var Seat[] */
    protected $seats;

    /**
     * @param int $firstRow
     */
    public function setFirstRow($firstRow)
    {
        $this->firstRow = $firstRow;
    }

    /**
     * @return int
     */
    public function getFirstRow()
    {
        return $this->firstRow;
    }

    /**
     * @param int $lastRow
     */
    public function setLastRow($lastRow)
    {
        $this->lastRow = $lastRow;
    }

    /**
     * @return int
     */
    public function getLastRow()
    {
        return $this->lastRow;
    }

    /**
     * @param int $numCols
     */
    public function setNumCols($numCols)
    {
        $this->numCols = $numCols;
    }

    /**
     * @return int
     */
    public function getNumCols()
    {
        return $this->numCols;
    }

    /**
     * @param int $numRows
     */
    public function setNumRows($numRows)
    {
        $this->numRows = $numRows;
    }

    /**
     * @return int
     */
    public function getNumRows()
    {
        return $this->numRows;
    }


    /**
     * @param Seat[] $seats
     */
    public function setSeats($seats)
    {
        $this->seats = $seats;
    }

    /**
     * @return Seat[]
     */
    public function getSeats()
    {
        return $this->seats;
    }

    /**
     * @param Seat $seat
     */
    public function addSeat($seat)
    {
        $this->seats[] = $seat;
    }


    /**
     * Returns object as Array.
     *
     * @return array
     */
    public function toArray()
    {
        $outputArray = array(
            'numRows' => $this->numRows,
            'numCols' => $this->numCols,
            'firstRow' => $this->firstRow,
            'lastRow' => $this->lastRow,
            'seats' => array(),
        );

        foreach ($this->seats as $seat) {
            $outputArray['seats'][] = $seat->toArray();
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
     * @param array $seatMapArray
     */
    public function buildFromArray(array $seatMapArray)
    {
        $this->numRows = $seatMapArray['numRows'];
        $this->numCols = $seatMapArray['numCols'];
        $this->firstRow = $seatMapArray['firstRow'];
        $this->lastRow = $seatMapArray['lastRow'];
        foreach ($seatMapArray['seat'] as $seatArray) {
            $seat = new Seat;
            $seat->buildFromArray($seatArray);
            $this->addSeat($seat);
        }
    }
}