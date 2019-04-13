<?php

namespace BukApi\Models\Reservation\Hotel;

use JsonSerializable;

/**
 * Class Location
 * @package BukApi\Models\Reservation\Hotel
 * @version March 14, 2018, 12:29 pm UTC
 *
 */
class Address implements JsonSerializable
{
    /**
     * Dirección
     * @var string 
     */
    private $address;
    /**
     * Código postal
     * @var string
     */
    private $zipCode;

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
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of zipCode
     */ 
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set the value of zipCode
     *
     * @return  self
     */ 
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }
}