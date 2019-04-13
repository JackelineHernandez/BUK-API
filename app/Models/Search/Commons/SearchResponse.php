<?php

namespace BukApi\Models\Search\Commons;

use JsonSerializable;

/**
 * Class SearchResponse
 * @package BukApi\Models\Search
 * @version March 14, 2018, 12:29 pm UTC
 *
 */
class SearchResponse implements JsonSerializable
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
	 * @var int
	 */
	private $totalRegs;	
		
	/**
	 * @var SearchResult
	 */
	private $results = [];

	/**
	 * Bean serialization
	 */
	public function jsonSerialize()
    {
        return get_object_vars($this);
    }

	/**
	 * Get the value of status
	 */ 
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Set the value of status
	 *
	 * @return  self
	 */ 
	public function setStatus($status)
	{
		$this->status = $status;

		return $this;
	}

	/**
	 * Get the value of message
	 */ 
	public function getMessage()
	{
		return $this->message;
	}

	/**
	 * Set the value of message
	 *
	 * @return  self
	 */ 
	public function setMessage($message)
	{
		$this->message = $message;

		return $this;
	}

	/**
	 * Get the value of totalRegs
	 */ 
	public function getTotalRegs()
	{
		return $this->totalRegs;
	}

	/**
	 * Set the value of totalRegs
	 *
	 * @return  self
	 */ 
	public function setTotalRegs($totalRegs)
	{
		$this->totalRegs = $totalRegs;

		return $this;
	}

	/**
	 * Get the value of results
	 */ 
	public function getResults()
	{
		return $this->results;
	}

	/**
	 * Set the value of results
	 *
	 * @return  self
	 */ 
	public function setResults($results)
	{
		$this->results = $results;

		return $this;
	}
}