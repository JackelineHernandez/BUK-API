<?php

namespace BukApi\Models\Search\Activity;

use JsonSerializable;

class ActivityPrice implements JsonSerializable
{
    /**
     * Precio para adultos
     * @var integer
     */
    private $adult;

    /**
     * Precio para niños
     * @var integer
     */
    private $child;

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
     * Get the value of adult
     */ 
    public function getAdult()
    {
        return $this->adult;
    }

    /**
     * Set the value of adult
     *
     * @return  self
     */ 
    public function setAdult($adult)
    {
        $this->adult = $adult;

        return $this;
    }

    /**
     * Get the value of child
     */ 
    public function getChild()
    {
        return $this->child;
    }

    /**
     * Set the value of child
     *
     * @return  self
     */ 
    public function setChild($child)
    {
        $this->child = $child;

        return $this;
    }
}