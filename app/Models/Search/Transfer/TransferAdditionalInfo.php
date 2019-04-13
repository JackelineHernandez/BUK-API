<?php

namespace BukApi\Models\Search\Transfer;

use JsonSerializable;

class TransferAdditionalInfo implements JsonSerializable
{
    /**
	* @var String
	*/  
    private $location;

    /**
	* @var SpecialNote
	*/  
    private $specialNotes = [];

    /**
     * @var Transfer
     */
    private $transfers = [];

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

    public function setLocation($location){
        $this->location = $location;
    }

    public function getLocation(){
        return $this->location;
    }

    public function setSpecialNotes(array $specialNotes){
        $this->specialNotes = $specialNotes;
    }

    public function getSpecialNotes(){
        return $this->specialNotes;
    }

    /**
     * Get the value of transfers
     */ 
    public function getTransfers()
    {
        return $this->transfers;
    }

    /**
     * Set the value of transfers
     *
     * @return  self
     */ 
    public function setTransfers($transfers)
    {
        $this->transfers = $transfers;

        return $this;
    }
}