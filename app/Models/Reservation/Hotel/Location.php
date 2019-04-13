<?php

namespace BukApi\Models\Reservation\Hotel;

use JsonSerializable;

/**
 * Class Location
 * @package BukApi\Models\Reservation\Hotel
 * @version March 14, 2018, 12:29 pm UTC
 *
 */
class Location implements JsonSerializable
{
    /**
     * Nombre del país
     * @var string 
     */
    private $country;
    /**
     * Nombre del estado
     * @var string
     */
    private $state;
    /**
     * Nombre de la ciudad
     * @var string
     */
    private $city;
    /**
     * Nombre de la zona
     * @var string
     */
    private $zone;

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
     * Get the value of country
     */ 
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set the value of country
     *
     * @return  self
     */ 
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get the value of state
     */ 
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */ 
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of city
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of zone
     */ 
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * Set the value of zone
     *
     * @return  self
     */ 
    public function setZone($zone)
    {
        $this->zone = $zone;

        return $this;
    }
}