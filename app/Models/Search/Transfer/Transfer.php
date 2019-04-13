<?php

namespace BukApi\Models\Search\Transfer;

use JsonSerializable;

class Transfer implements JsonSerializable
{
    /**
     * Precio total
     * @var integer
     */
    private $totalPrice;
    /**
     * Vehiculos
     * @var Vehicle
     */
    private $vehicles = [];

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
     * Get the value of vehicles
     */ 
    public function getVehicles()
    {
        return $this->vehicles;
    }

    /**
     * Set the value of vehicles
     *
     * @return  self
     */ 
    public function setVehicles($vehicles)
    {
        $this->vehicles = $vehicles;

        return $this;
    }
}