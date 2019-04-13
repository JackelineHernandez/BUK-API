<?php

namespace BukApi\Models\Search\Transfer;

use JsonSerializable;

class Vehicle implements JsonSerializable
{
    /**
     * @var string
     */
    private $tripType;
    /**
     * @var string
     */
    private $transferType;
    /**
     * @var string
     */
    private $productId;
    /**
     * @var string
     */
    private $productTypeId;
    /**
     * @var string
     */
    private $vehicleName;
    /**
     * @var string
     */
    private $vehicleType;
    /**
     * @var integer
     */
    private $childAgeLimit;
    /**
     * @var integer
     */
    private $maxPax;
    /**
     * @var integer
     */
    private $maxBag;
    /**
     * @var integer
     */
    private $price;
    /**
     * @var date
     */
    private $cancellationDate;
    /**
     * @var boolean
     */
    private $isHandicapped;
    /**
     * @var boolean
     */
    private $isTaxi;
    /**
     * @var integer
     */
    private $transferTimeInMinutes;
    /**
     * @var integer
     */
    private $units;
    /**
     * @var Image
     */
    private $images = [];

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
     * Get the value of tripType
     */ 
    public function getTripType()
    {
        return $this->tripType;
    }

    /**
     * Set the value of tripType
     *
     * @return  self
     */ 
    public function setTripType($tripType)
    {
        $this->tripType = $tripType;

        return $this;
    }

    /**
     * Get the value of transferType
     */ 
    public function getTransferType()
    {
        return $this->transferType;
    }

    /**
     * Set the value of transferType
     *
     * @return  self
     */ 
    public function setTransferType($transferType)
    {
        $this->transferType = $transferType;

        return $this;
    }

    /**
     * Get the value of productId
     */ 
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set the value of productId
     *
     * @return  self
     */ 
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get the value of productTypeId
     */ 
    public function getProductTypeId()
    {
        return $this->productTypeId;
    }

    /**
     * Set the value of productTypeId
     *
     * @return  self
     */ 
    public function setProductTypeId($productTypeId)
    {
        $this->productTypeId = $productTypeId;

        return $this;
    }

    /**
     * Get the value of vehicleName
     */ 
    public function getVehicleName()
    {
        return $this->vehicleName;
    }

    /**
     * Set the value of vehicleName
     *
     * @return  self
     */ 
    public function setVehicleName($vehicleName)
    {
        $this->vehicleName = $vehicleName;

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
     * Get the value of childAgeLimit
     */ 
    public function getChildAgeLimit()
    {
        return $this->childAgeLimit;
    }

    /**
     * Set the value of childAgeLimit
     *
     * @return  self
     */ 
    public function setChildAgeLimit($childAgeLimit)
    {
        $this->childAgeLimit = $childAgeLimit;

        return $this;
    }

    /**
     * Get the value of maxPax
     */ 
    public function getMaxPax()
    {
        return $this->maxPax;
    }

    /**
     * Set the value of maxPax
     *
     * @return  self
     */ 
    public function setMaxPax($maxPax)
    {
        $this->maxPax = $maxPax;

        return $this;
    }

    /**
     * Get the value of maxBag
     */ 
    public function getMaxBag()
    {
        return $this->maxBag;
    }

    /**
     * Set the value of maxBag
     *
     * @return  self
     */ 
    public function setMaxBag($maxBag)
    {
        $this->maxBag = $maxBag;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of cancellationDate
     */ 
    public function getCancellationDate()
    {
        return $this->cancellationDate;
    }

    /**
     * Set the value of cancellationDate
     *
     * @return  self
     */ 
    public function setCancellationDate($cancellationDate)
    {
        $this->cancellationDate = $cancellationDate;

        return $this;
    }

    /**
     * Get the value of isHandicapped
     */ 
    public function getIsHandicapped()
    {
        return $this->isHandicapped;
    }

    /**
     * Set the value of isHandicapped
     *
     * @return  self
     */ 
    public function setIsHandicapped($isHandicapped)
    {
        $this->isHandicapped = $isHandicapped;

        return $this;
    }

    /**
     * Get the value of isTaxi
     */ 
    public function getIsTaxi()
    {
        return $this->isTaxi;
    }

    /**
     * Set the value of isTaxi
     *
     * @return  self
     */ 
    public function setIsTaxi($isTaxi)
    {
        $this->isTaxi = $isTaxi;

        return $this;
    }

    /**
     * Get the value of transferTimeInMinutes
     */ 
    public function getTransferTimeInMinutes()
    {
        return $this->transferTimeInMinutes;
    }

    /**
     * Set the value of transferTimeInMinutes
     *
     * @return  self
     */ 
    public function setTransferTimeInMinutes($transferTimeInMinutes)
    {
        $this->transferTimeInMinutes = $transferTimeInMinutes;

        return $this;
    }

    /**
     * Get the value of units
     */ 
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * Set the value of units
     *
     * @return  self
     */ 
    public function setUnits($units)
    {
        $this->units = $units;

        return $this;
    }

    /**
     * Get the value of images
     */ 
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set the value of images
     *
     * @return  self
     */ 
    public function setImages($images)
    {
        $this->images = $images;

        return $this;
    }
}