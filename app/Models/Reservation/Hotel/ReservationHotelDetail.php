<?php

namespace BukApi\Models\Reservation\Hotel;

use JsonSerializable;

/**
 * Class ReservationHotelDetail
 * @package BukApi\Models\Reservation\Hotel
 * @version March 14, 2018, 12:29 pm UTC
 *
  NOTA: se iran sumando poco a poco el resto de parametros
 */
class ReservationHotelDetail implements JsonSerializable
{
    /**
     * @var integer
     */
    private $roomNumber;
    /**
     * @var string
     */
    private $roomType;
    /**
     * @var integer
     */
    private $refPrice;
    /**
     * @var Pax
     */
    private $pax = [];

    /**
	 * Bean serialization
	 */
	public function jsonSerialize()
    {
        return get_object_vars($this);
    }

	/**
	 * Building object from json
	 */
	public function jsonDeserialize($data) {
		foreach ($data AS $key => $value) {	
			$this->{$key} = $value;
		}		
    }

    /**
     * Get the value of roomNumber
     */ 
    public function getRoomNumber()
    {
        return $this->roomNumber;
    }

    /**
     * Set the value of roomNumber
     *
     * @return  self
     */ 
    public function setRoomNumber($roomNumber)
    {
        $this->roomNumber = $roomNumber;

        return $this;
    }

    /**
     * Get the value of roomType
     */ 
    public function getRoomType()
    {
        return $this->roomType;
    }

    /**
     * Set the value of roomType
     *
     * @return  self
     */ 
    public function setRoomType($roomType)
    {
        $this->roomType = $roomType;

        return $this;
    }

    /**
     * Get the value of refPrice
     */ 
    public function getRefPrice()
    {
        return $this->refPrice;
    }

    /**
     * Set the value of refPrice
     *
     * @return  self
     */ 
    public function setRefPrice($refPrice)
    {
        $this->refPrice = $refPrice;

        return $this;
    }

    /**
     * Get the value of pax
     */ 
    public function getPax()
    {
        return $this->pax;
    }

    /**
     * Set the value of pax
     *
     * @return  self
     */ 
    public function setPax($pax)
    {
        $this->pax = $pax;

        return $this;
    }
}