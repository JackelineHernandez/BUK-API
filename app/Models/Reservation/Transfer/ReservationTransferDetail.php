<?php

namespace BukApi\Models\Reservation\Transfer;

use JsonSerializable;

/**
 * Class ReservationTransferDetail
 * @package BukApi\Models\Reservation\Transfer
 * @version March 26, 2018, 12:29 pm UTC
 *
 */
class ReservationTransferDetail implements JsonSerializable
{
    /**
     * Locacion
     * @var string
     */
    private $location;
    /**
     * Origen
     * @var string
     */
    private $origin;
    /**
     * Destino
     * @var string
     */
    private $destination;
    /**
     * Precio de referencia
     * @var integer
     */
    private $refPrice;
    /**
     * Tipo de vehiculo
     * @var string
     */
    private $vehicleType;
    /**
     * Nombre del vehiculo
     * @var string
     */
    private $vehicle;
    /**
     * Cantidad de pasajeros adultos
     * @var integer
     */
    private $paxAdults;
    /**
     * Cantidad de pasajeros niños
     * @var integer
     */
    private $paxChildren;
    /** 
     * Datos del dueño
     * @var Owner
     */
    private $owner = [];

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
     * Get the value of origin
     */ 
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * Set the value of origin
     *
     * @return  self
     */ 
    public function setOrigin($origin)
    {
        $this->origin = $origin;

        return $this;
    }

    /**
     * Get the value of destination
     */ 
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Set the value of destination
     *
     * @return  self
     */ 
    public function setDestination($destination)
    {
        $this->destination = $destination;

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
     * Get the value of vehicleType
     */ 
    public function getVehicleType()
    {
        return $this->vehicleType;
    }

    /**
     * Set the value of vehicleType
     *
     * @return  self
     */ 
    public function setVehicleType($vehicleType)
    {
        $this->vehicleType = $vehicleType;

        return $this;
    }

    /**
     * Get the value of vehicle
     */ 
    public function getVehicle()
    {
        return $this->vehicle;
    }

    /**
     * Set the value of vehicle
     *
     * @return  self
     */ 
    public function setVehicle($vehicle)
    {
        $this->vehicle = $vehicle;

        return $this;
    }

    /**
     * Get the value of paxAdults
     */ 
    public function getPaxAdults()
    {
        return $this->paxAdults;
    }

    /**
     * Set the value of paxAdults
     *
     * @return  self
     */ 
    public function setPaxAdults($paxAdults)
    {
        $this->paxAdults = $paxAdults;

        return $this;
    }

    /**
     * Get the value of paxChildren
     */ 
    public function getPaxChildren()
    {
        return $this->paxChildren;
    }

    /**
     * Set the value of paxChildren
     *
     * @return  self
     */ 
    public function setPaxChildren($paxChildren)
    {
        $this->paxChildren = $paxChildren;

        return $this;
    }

    /**
     * Get the value of owner
     */ 
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set the value of owner
     *
     * @return  self
     */ 
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }
}