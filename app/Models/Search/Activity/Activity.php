<?php

namespace BukApi\Models\Search\Activity;

use JsonSerializable;

class Activity implements JsonSerializable
{
    /**
     * Tipos de Activity
     * @var ActivityType
     */
    private $types = [];

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
     * Get the value of types
     */ 
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * Set the value of types
     *
     * @return  self
     */ 
    public function setTypes($types)
    {
        $this->types = $types;

        return $this;
    }
}