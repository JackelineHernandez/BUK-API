<?php

namespace BukApi\Models\Reservation\Commons;

use JsonSerializable;

/**
 * Class ReservationResponse
 * @package BukApi\Models\Reservation\Hotel
 * @version March 15, 2018, 12:29 pm UTC
 *
 */
class ReservationResponse implements JsonSerializable
{
    /**
	* @var boolean
	*/
	private $status;
	/**
	* @var string
	*/
	private $message;
	/**
	* @var Reservation
	*/
	private $result;

	/**
	 * Bean Serialization
	 */
	public function jsonSerialize()
    {
        return get_object_vars($this);
    }

	/**
	 * Get 	* @var: boolean
	 */ 
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Set 	* @var: boolean
	 *
	 * @return  self
	 */ 
	public function setStatus($status)
	{
		$this->status = $status;

		return $this;
	}

	/**
	 * Get 	* @var: string
	 */ 
	public function getMessage()
	{
		return $this->message;
	}

	/**
	 * Set 	* @var: string
	 *
	 * @return  self
	 */ 
	public function setMessage($message)
	{
		$this->message = $message;

		return $this;
	}

	/**
	 * Get 	* @var: Reservation
	 */ 
	public function getResult()
	{
		return $this->result;
	}

	/**
	 * Set 	* @var: Reservation
	 *
	 * @return  self
	 */ 
	public function setResult($result)
	{
		$this->result = $result;

		return $this;
	}
}