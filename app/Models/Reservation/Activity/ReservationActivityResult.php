<?php

namespace BukApi\Models\Reservation\Activity;

use JsonSerializable;

/**
 * Class ReservationActivityResult
 * @package BukApi\Models\Reservation\Activity
 * @version April 02, 2018, 12:29 pm UTC
 *
 */
class ReservationActivityResult implements JsonSerializable
{
    /**
     * Identificador de la reserva
     * @var string
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
     * Las razones de cancelacion
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
     * Detalles de la reserva del traslado
     * @var ReservationTourDetail
     */
    private $reservationDetailTours = [];
    /**
     * Poliza
     * @var CxlPolicy
     */
    private $cxlPolicy = [];
    
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
     * Get identificador de la reserva
     *
     * @return  string
     */ 
    public function getIdReservation()
    {
        return $this->idReservation;
    }

    /**
     * Set identificador de la reserva
     *
     * @param  string  $idReservation  Identificador de la reserva
     *
     * @return  self
     */ 
    public function setIdReservation(string $idReservation)
    {
        $this->idReservation = $idReservation;

        return $this;
    }

    /**
     * Get status de la reserva por parte del proveedor
     *
     * @return  string
     */ 
    public function getStatusProvider()
    {
        return $this->statusProvider;
    }

    /**
     * Set status de la reserva por parte del proveedor
     *
     * @param  string  $statusProvider  Status de la reserva por parte del proveedor
     *
     * @return  self
     */ 
    public function setStatusProvider(string $statusProvider)
    {
        $this->statusProvider = $statusProvider;

        return $this;
    }

    /**
     * Get status de la reserva
     *
     * @return  boolean
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status de la reserva
     *
     * @param  boolean  $status  Status de la reserva
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get las razones de cancelacion
     *
     * @return  string
     */ 
    public function getCancelationReasons()
    {
        return $this->cancelationReasons;
    }

    /**
     * Set las razones de cancelacion
     *
     * @param  string  $cancelationReasons  Las razones de cancelacion
     *
     * @return  self
     */ 
    public function setCancelationReasons($cancelationReasons)
    {
        $this->cancelationReasons = $cancelationReasons;

        return $this;
    }

    /**
     * Get monto de comision
     *
     * @return  integer
     */ 
    public function getCommission()
    {
        return $this->commission;
    }

    /**
     * Set monto de comision
     *
     * @param  int  $commission  Monto de comision
     *
     * @return  self
     */ 
    public function setCommission(int $commission)
    {
        $this->commission = $commission;

        return $this;
    }

    /**
     * Get monto total
     *
     * @return  integer
     */ 
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * Set monto total
     *
     * @param  integer  $totalPrice  Monto total
     *
     * @return  self
     */ 
    public function setTotalPrice(int $totalPrice)
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    /**
     * Get cantidad de noches
     *
     * @return  integer
     */ 
    public function getNights()
    {
        return $this->nights;
    }

    /**
     * Set cantidad de noches
     *
     * @param  integer  $nights  Cantidad de noches
     *
     * @return  self
     */ 
    public function setNights(int $nights)
    {
        $this->nights = $nights;

        return $this;
    }

    /**
     * Get fecha limite de pago
     *
     * @return  date
     */ 
    public function getPayBefore()
    {
        return $this->payBefore;
    }

    /**
     * Set fecha limite de pago
     *
     * @param  date  $payBefore  Fecha limite de pago
     *
     * @return  self
     */ 
    public function setPayBefore($payBefore)
    {
        $this->payBefore = $payBefore;

        return $this;
    }

    /**
     * Get nombre de la compañia
     *
     * @return  string
     */ 
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set nombre de la compañia
     *
     * @param  string  $company  Nombre de la compañia
     *
     * @return  self
     */ 
    public function setCompany(string $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get detalles de la reserva del traslado
     *
     * @return  ReservationTourDetail
     */ 
    public function getReservationDetailTours()
    {
        return $this->reservationDetailTours;
    }

    /**
     * Set detalles de la reserva del traslado
     *
     * @param  ReservationTourDetail  $reservationDetailTours  Detalles de la reserva del traslado
     *
     * @return  self
     */ 
    public function setReservationDetailTours($reservationDetailTours)
    {
        $this->reservationDetailTours = $reservationDetailTours;

        return $this;
    }

    /**
     * Get poliza
     *
     * @return  CxlPolicy
     */ 
    public function getCxlPolicy()
    {
        return $this->cxlPolicy;
    }

    /**
     * Set poliza
     *
     * @param  CxlPolicy  $cxlPolicy  Poliza
     *
     * @return  self
     */ 
    public function setCxlPolicy($cxlPolicy)
    {
        $this->cxlPolicy = $cxlPolicy;

        return $this;
    }
}