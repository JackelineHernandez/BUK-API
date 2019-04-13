<?php

namespace BukApi\Models\Search\Hotel;

use BukApi\Models\Search\Hotel\Image;
use BukApi\Models\Search\Hotel\Room;
use BukApi\Models\Search\Hotel\SpecialNote;
use JsonSerializable;

class HotelAdditionalInfo implements JsonSerializable
{
    /**
	* @var string
	*/  
    private $location;
    /**
	* @var string
	*/  
    private $category;
    /**
	* @var boolean
	*/  
    private $reserveMultiHab;
    /**
	* @var SpecialNote
	*/  
    private $specialNotes = [];
    /**
	* @var Image
	*/  
    private $images = [];
    /**
	* @var integer
	*/  
    private $roomsQty;
    /**
	* @var Room
	*/  
    private $rooms = [];

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

    public function setCategory($category){
        $this->category = $category;
    }

    public function getCategory(){
        return $this->category;
    }

    public function setReserveMultiHab($reserveMultiHab){
        $this->reserveMultiHab = $reserveMultiHab;
    }

    public function getReserveMultiHab(){
        return $this->reserveMultiHab;
    }

    public function setSpecialNotes(array $specialNotes){
        $this->specialNotes = $specialNotes;
    }

    public function getSpecialNotes(){
        return $this->specialNotes;
    }

    public function setImages(array $images){
        $this->images = $images;
    }

    public function getImages(){
        return $this->images;
    }

    public function setRoomsQty($roomsQty){
        $this->roomsQty = $roomsQty;
    }

    public function getRoomsQty(){
        return $this->roomsQty;
    }

    public function setRooms(array $rooms){
        $this->rooms = $rooms;
    }

    public function getRooms(){
        return $this->rooms;
    }

}