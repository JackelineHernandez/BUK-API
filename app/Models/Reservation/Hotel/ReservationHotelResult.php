<?php

namespace BukApi\Models\Reservation\Hotel;

use JsonSerializable;

/**
 * Class ReservationResult
 * @package BukApi\Models\Reservation\Hotel
 * @version March 14, 2018, 12:29 pm UTC
 *
  NOTA: se iran sumando poco a poco el resto de parametros
 */
class ReservationHotelResult implements JsonSerializable
{
    /**
     * Identificador de la reserva
     * @var integer 
     */
    private $idReservation;
    /**
     * Status de la reserva por parte del proveedor
     * @var string 
     */
    private $statusProvider;
    /**
     * Status de la reserva
     * @var boolean
     */
    private $status;
    /**
     * Razones de cancelacion
     * @var string
     */
    private $cancelationReasons;
    /**
     * Monto de comision
     * @var integer
     */
    private $commission;
    /**
     * Monto total
     * @var integer
     */
    private $totalPrice;
    /**
     * Cantidad de noches
     * @var integer
     */
    private $nights;
    /**
     * Fecha limite de pago
     * @var date
     */
    private $payBefore;
    /**
     * Nombre de la compañia
     * @var string
     */
    private $company;
    /**
     * Detalles de la reserva del hotel
     * @var ReservationHotelDetail
     */
    private $reservationDetail = [];
    /**
     * Poliza
     * @var CxlPolicy
     */
    private $cxlPolicy = [];
    /**
     * Detalles del hotel
     * @var HotelDetail
     */
    private $hotelDetail = [];

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
     * Get the value of idReservation
     */ 
    public function getIdReservation()
    {
        return $this->idReservation;
    }

    /**
     * Set the value of idReservation
     *
     * @return  self
     */ 
    public function setIdReservation($idReservation)
    {
        $this->idReservation = $idReservation;

        return $this;
    }

    /**
     * Get the value of statusProvider
     */ 
    public function getStatusProvider()
    {
        return $this->statusProvider;
    }

    /**
     * Set the value of statusProvider
     *
     * @return  self
     */ 
    public function setStatusProvider($statusProvider)
    {
        $this->statusProvider = $statusProvider;

        return $this;
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
     * Get the value of cancelationReasons
     */ 
    public function getCancelationReasons()
    {
        return $this->cancelationReasons;
    }

    /**
     * Set the value of cancelationReasons
     *
     * @return  self
     */ 
    public function setCancelationReasons($cancelationReasons)
    {
        $this->cancelationReasons = $cancelationReasons;

        return $this;
    }

    /**
     * Get the value of commission
     */ 
    public function getCommission()
    {
        return $this->commission;
    }

    /**
     * Set the value of commission
     *
     * @return  self
     */ 
    public function setCommission($commission)
    {
        $this->commission = $commission;

        return $this;
    }

    /**
     * Get the value of totalPrice
     */ 
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * Set the value of totalPrice
     *
     * @return  self
     */ 
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    /**
     * Get the value of nights
     */ 
    public function getNights()
    {
        return $this->nights;
    }

    /**
     * Set the value of nights
     *
     * @return  self
     */ 
    public function setNights($nights)
    {
        $this->nights = $nights;

        return $this;
    }

    /**
     * Get the value of payBefore
     */ 
    public function getPayBefore()
    {
        return $this->payBefore;
    }

    /**
     * Set the value of payBefore
     *
     * @return  self
     */ 
    public function setPayBefore($payBefore)
    {
        $this->payBefore = $payBefore;

        return $this;
    }

    /**
     * Get the value of company
     */ 
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set the value of company
     *
     * @return  self
     */ 
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get the value of reservationDetail
     */ 
    public function getReservationDetail()
    {
        return $this->reservationDetail;
    }

    /**
     * Set the value of reservationDetail
     *
     * @return  self
     */ 
    public function setReservationDetail($reservationDetail)
    {
        $this->reservationDetail = $reservationDetail;

        return $this;
    }

    /**
     * Get the value of cxlPolicy
     */ 
    public function getCxlPolicy()
    {
        return $this->cxlPolicy;
    }

    /**
     * Set the value of cxlPolicy
     *
     * @return  self
     */ 
    public function setCxlPolicy($cxlPolicy)
    {
        $this->cxlPolicy = $cxlPolicy;

        return $this;
    }

    /**
     * Get the value of hotelDetail
     */ 
    public function getHotelDetail()
    {
        return $this->hotelDetail;
    }

    /**
     * Set the value of hotelDetail
     *
     * @return  self
     */ 
    public function setHotelDetail($hotelDetail)
    {
        $this->hotelDetail = $hotelDetail;

        return $this;
    }
}