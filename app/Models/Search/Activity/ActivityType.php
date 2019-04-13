<?php

namespace BukApi\Models\Search\Activity;

use JsonSerializable;

class ActivityType implements JsonSerializable
{
    /**
     * Nombre del Activity
     * @var string
     */
    private $name;

    /**
     * Precios del Activity
     * @var ActivityPrice
     */
    private $prices = [];

    /**
     * Fechas disponibles
     * @var array
     */
    private $availableDates = [];

    /**
     * Duracion del Activity
     * @var string
     */
    private $duration;

    /**
     * Precio total del Activity
     * @var integer
     */
    private $totalPrice;
    
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
     * Get the value of availableDates
     */ 
    public function getAvailableDates()
    {
        return $this->availableDates;
    }

    /**
     * Set the value of availableDates
     *
     * @return  self
     */ 
    public function setAvailableDates($availableDates)
    {
        $this->availableDates = $availableDates;

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
}