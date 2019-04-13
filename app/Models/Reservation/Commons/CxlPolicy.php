<?php

namespace BukApi\Models\Reservation\Commons;

use JsonSerializable;

/**
 * Class CxlPolicy
 * @package BukApi\Models\Reservation\Commons
 * @version March 14, 2018, 12:29 pm UTC
 *
 */
class CxlPolicy implements JsonSerializable
{
    /**
     * Fecha de inicio
     * @var date
     */
    private $from;
    /**
     * Fecha de fin
     * @var date
     */
    private $to;
    /**
     * Monto a cargar
     * @var integer
     */
    private $cxlCharge;

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
     * Get the value of from
     */ 
    public function getFrom()
    {
        return $this->from;
	}
	
    /**
     * Get the value of to
     */ 
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Get the value of cxlCharge
     */ 
    public function getCxlCharge()
    {
        return $this->cxlCharge;
    }

    /**
     * Set the value of from
     *
     * @return  self
     */ 
    public function setFrom($from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Set the value of to
     *
     * @return  self
     */ 
    public function setTo($to)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Set the value of cxlCharge
     *
     * @return  self
     */ 
    public function setCxlCharge($cxlCharge)
    {
        $this->cxlCharge = $cxlCharge;

        return $this;
    }
}