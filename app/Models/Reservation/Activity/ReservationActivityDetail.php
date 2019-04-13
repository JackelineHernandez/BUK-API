<?php

namespace BukApi\Models\Reservation\Activity;

use JsonSerializable;

/**
 * Class ReservationActivityDetail
 * @package BukApi\Models\Reservation\Activity
 * @version April 02, 2018, 12:29 pm UTC
 *
 */
class ReservationActivityDetail implements JsonSerializable
{
    private $name;
    private $prices;
    private $duration;
    private $totalPrice;
    private $paxList = [];
    
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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of prices
     */ 
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * Set the value of prices
     *
     * @return  self
     */ 
    public function setPrices($prices)
    {
        $this->prices = $prices;

        return $this;
    }

    /**
     * Get the value of duration
     */ 
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set the value of duration
     *
     * @return  self
     */ 
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get the value of totalPrice
     */ 
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * Set the value of totalPrice
     *
     * @return  self
     */ 
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    /**
     * Set the value of paxList
     *
     * @return  self
     */ 
    public function setPaxList($paxList)
    {
        $this->paxList = $paxList;

        return $this;
    }
}