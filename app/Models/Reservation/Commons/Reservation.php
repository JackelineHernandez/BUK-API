<?php

namespace BukApi\Models\Reservation\Commons;

use JsonSerializable;
use BukApi\Models\Search\Commons\SearchResult;

/**
 * Class Reservation
 * @package BukApi\Models\Reservation\Hotel
 * @version March 15, 2018, 12:29 pm UTC
 */
 class Reservation implements JsonSerializable
{
   /**
    * Valores asociados al producto que se quiere reservar 
	* @var SearchResult 
	*/  
    private $product;
    /**
     * Identificador de la reserva
	* @var string 
	*/  
    private $id;
    /**
     * Titulo de la reserva
     * @var string
     */
    private $title;
    /**
     * Descripción de la reserva
     * @var string
     */
    private $description;
    /**
     * Identificador del producto
     * @var string
     */
    private $productId;
    /**
     * Destino
     * @var string
     */
    private $destination;
    /**
     * Fecha de inicio
     * @var date
     */
    private $dateIni;
    /**
     * Fecha de fin
     * @var date
     */
    private $dateEnd;
    /**
     * @var json
     */
    private $additionalInfo;
    
	/**
	 * Serialización del bean
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
			if (($key == "product") && ($value != null)) {
				$this->product = new SearchResult();
				$this->product->jsonDeserialize($value);
			}
			else {
 				$this->{$key} = $value;
			}
        }
    }

    /**
     * Get the value of product
     */ 
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set the value of product
     *
     * @return  self
     */ 
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

	/**
	 * Get the value of additionalInfo
	 */ 
	public function getAdditionalInfo()
	{
		return $this->additionalInfo;
	}

	/**
	 * Set the value of additionalInfo
	 *
	 * @return  self
	 */ 
	public function setAdditionalInfo($additionalInfo)
	{
		$this->additionalInfo = $additionalInfo;

		return $this;
	}

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
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
     * Get the value of dateIni
     */ 
    public function getDateIni()
    {
        return $this->dateIni;
    }

    /**
     * Set the value of dateIni
     *
     * @return  self
     */ 
    public function setDateIni($dateIni)
    {
        $this->dateIni = $dateIni;

        return $this;
    }

    /**
     * Get the value of dateEnd
     */ 
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * Set the value of dateEnd
     *
     * @return  self
     */ 
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }
}