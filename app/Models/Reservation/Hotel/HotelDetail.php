<?php

namespace BukApi\Models\Reservation\Hotel;

use JsonSerializable;

/**
 * Class HotelDetail
 * @package BukApi\Models\Reservation\Hotel
 * @version March 14, 2018, 12:29 pm UTC
 *
 */
class HotelDetail implements JsonSerializable
{
    /**
     * Nombre del hotel
     * @var string
     */
    private $name;
    /**
     * Locación del hotel
     * @var Location 
     */
    private $location;
    /**
     * Dirección del hotel
     * @var Address
     */
    private $address;
    /**
     * Número de tlf
     * @var string
     */
    private $phone;

    /**
	 * bean serialization
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
     * Get the value of location
     */ 
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set the value of location
     *
     * @return  self
     */ 
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
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
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }
}