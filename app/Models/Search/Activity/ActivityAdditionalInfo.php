<?php

namespace BukApi\Models\Search\Activity;

use JsonSerializable;

class ActivityAdditionalInfo implements JsonSerializable
{
    /**
     * Direccion
     * @var ActivityType
     */
    private $location;

    /**
     * Imagenes
     * @var Image
     */
    private $images = [];

    /**
     * Notas
     * @var HotelSpecialNote
     */
    private $specialNotes = [];
    
    /**
     * Informacion de cada tour
     * @var Activity
     */
    private $tours = [];

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

    /**
     * Get the value of specialNotes
     */ 
    public function getSpecialNotes()
    {
        return $this->specialNotes;
    }

    /**
     * Set the value of specialNotes
     *
     * @return  self
     */ 
    public function setSpecialNotes($specialNotes)
    {
        $this->specialNotes = $specialNotes;

        return $this;
    }

    /**
     * Get the value of tours
     */ 
    public function getTours()
    {
        return $this->tours;
    }

    /**
     * Set the value of tours
     *
     * @return  self
     */ 
    public function setTours($tours)
    {
        $this->tours = $tours;

        return $this;
    }
}