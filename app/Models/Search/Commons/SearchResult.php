<?php

namespace BukApi\Models\Search\Commons;

use JsonSerializable;

/**
 * Class SearchResult
 * @package BukApi\Models\Search
 * @version March 14, 2018, 12:29 pm UTC
 *
  NOTA: se iran sumando poco a poco el resto de parametros
 */
 class SearchResult implements JsonSerializable
{
    /**
	* @var string
	*/  
	private $id;
	
    /**
	* @var string
	*/  
	private $title;

	 /**
	* @var string
	*/  
	private $description;
	
    /**
	* @var string
	*/  
	private $productId;
	
    /**
	* @var string
	*/  
	private $destination;

	/**
	* @var string
	*/    
	private $dateIni;
	
    /**
	* @var string
	*/
	private $dateEnd;
	
    /**
     * @var json 
     */
	private $additionalInfo = [];

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

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getTitle(){
		return $this->title;
	}

	public function setTitle($title){
		$this->title = $title;
	}

	public function getProductId(){
		return $this->productId;
	}

	public function setProductId($productId){
		$this->productId = $productId;
	}

	public function getOrigin(){
		return $this->origin;
	}

	public function getDestination(){
		return $this->destination;
	}

	public function setDestination($destination){
		$this->destination = $destination;
	}

	public function getAdditionalInfo(){
		return $this->additionalInfo;
	}

	public function setAdditionalInfo($additionalInfo){
		$this->additionalInfo = $additionalInfo;
	}

	public function getDateini(){
		return $this->dateIni;
	}

	public function setDateini($dateini){
		$this->dateIni = $dateini;
	}

	public function getDateend(){
		return $this->dateEnd;
	}

	public function setDateend($dateend){
		$this->dateEnd = $dateend;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setDescription($description){
		$this->description = $description;
	}

}