<?php

namespace BukApi\Models\Search\Hotel;

use JsonSerializable;

class Room implements JsonSerializable
{
    private $description;

    private $roomType;

    private $roomId;

    private $bookParam;

    private $optionId;

    private $accomodationId;

    private $maxPax;

    private $optionNightsNetTotal;

    private $netPrice;

    private $optionCommissionValue;

    private $optionNightsTotal;

    private $refPrice;

    private $optionFreeNightsTotal;

    private $optionCommissionPercentage;

    private $nights;

    private $specialPrice;

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
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

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
     * Get the value of roomId
     */ 
    public function getRoomId()
    {
        return $this->roomId;
    }

    /**
     * Set the value of roomId
     *
     * @return  self
     */ 
    public function setRoomId($roomId)
    {
        $this->roomId = $roomId;

        return $this;
    }

    /**
     * Get the value of bookParam
     */ 
    public function getBookParam()
    {
        return $this->bookParam;
    }

    /**
     * Set the value of bookParam
     *
     * @return  self
     */ 
    public function setBookParam($bookParam)
    {
        $this->bookParam = $bookParam;

        return $this;
    }

    /**
     * Get the value of optionId
     */ 
    public function getOptionId()
    {
        return $this->optionId;
    }

    /**
     * Set the value of optionId
     *
     * @return  self
     */ 
    public function setOptionId($optionId)
    {
        $this->optionId = $optionId;

        return $this;
    }

    /**
     * Get the value of accomodationId
     */ 
    public function getAccomodationId()
    {
        return $this->accomodationId;
    }

    /**
     * Set the value of accomodationId
     *
     * @return  self
     */ 
    public function setAccomodationId($accomodationId)
    {
        $this->accomodationId = $accomodationId;

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
     * Get the value of optionNightsNetTotal
     */ 
    public function getOptionNightsNetTotal()
    {
        return $this->optionNightsNetTotal;
    }

    /**
     * Set the value of optionNightsNetTotal
     *
     * @return  self
     */ 
    public function setOptionNightsNetTotal($optionNightsNetTotal)
    {
        $this->optionNightsNetTotal = $optionNightsNetTotal;

        return $this;
    }

    /**
     * Get the value of netPrice
     */ 
    public function getNetPrice()
    {
        return $this->netPrice;
    }

    /**
     * Set the value of netPrice
     *
     * @return  self
     */ 
    public function setNetPrice($netPrice)
    {
        $this->netPrice = $netPrice;

        return $this;
    }

    /**
     * Get the value of optionCommissionValue
     */ 
    public function getOptionCommissionValue()
    {
        return $this->optionCommissionValue;
    }

    /**
     * Set the value of optionCommissionValue
     *
     * @return  self
     */ 
    public function setOptionCommissionValue($optionCommissionValue)
    {
        $this->optionCommissionValue = $optionCommissionValue;

        return $this;
    }

    /**
     * Get the value of optionNightsTotal
     */ 
    public function getOptionNightsTotal()
    {
        return $this->optionNightsTotal;
    }

    /**
     * Set the value of optionNightsTotal
     *
     * @return  self
     */ 
    public function setOptionNightsTotal($optionNightsTotal)
    {
        $this->optionNightsTotal = $optionNightsTotal;

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
     * Get the value of optionFreeNightsTotal
     */ 
    public function getOptionFreeNightsTotal()
    {
        return $this->optionFreeNightsTotal;
    }

    /**
     * Set the value of optionFreeNightsTotal
     *
     * @return  self
     */ 
    public function setOptionFreeNightsTotal($optionFreeNightsTotal)
    {
        $this->optionFreeNightsTotal = $optionFreeNightsTotal;

        return $this;
    }

    /**
     * Get the value of optionCommissionPercentage
     */ 
    public function getOptionCommissionPercentage()
    {
        return $this->optionCommissionPercentage;
    }

    /**
     * Set the value of optionCommissionPercentage
     *
     * @return  self
     */ 
    public function setOptionCommissionPercentage($optionCommissionPercentage)
    {
        $this->optionCommissionPercentage = $optionCommissionPercentage;

        return $this;
    }

    /**
     * Get the value of nights
     */ 
    public function getNights()
    {
        return $this->nights;
    }

    /**
     * Set the value of nights
     *
     * @return  self
     */ 
    public function setNights($nights)
    {
        $this->nights = $nights;

        return $this;
    }

    /**
     * Get the value of specialPrice
     */ 
    public function getSpecialPrice()
    {
        return $this->specialPrice;
    }

    /**
     * Set the value of specialPrice
     *
     * @return  self
     */ 
    public function setSpecialPrice($specialPrice)
    {
        $this->specialPrice = $specialPrice;

        return $this;
    }
}