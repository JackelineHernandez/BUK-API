<?php

namespace BukApi\Models\Search\Hotel;

use JsonSerializable;

class HotelSpecialNote implements JsonSerializable
{
    /**
     * Nota
     * @var string
     */
    private $note;
    /**
     * fecha de inicio
     * @var date
     */
    private $from;
    /**
     * fecha de fin
     * @var date
     */
    private $to;

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

    public function setNote($note){
        $this->note = $note;
    }

    public function getNote(){
        return $this->note;
    }

    public function setFrom($from){
        $this->from = $from;
    }

    public function getFrom(){
        return $this->from;
    }

    public function setTo($to){
        $this->to = $to;
    }

    public function getTo(){
        return $this->to;
    }
}