<?php

namespace BukApi\Models\Reservation\Transfer;

use JsonSerializable;

/**
 * Class ReservationTransferResult
 * @package BukApi\Models\Reservation\Transfer
 * @version March 26, 2018, 12:29 pm UTC
 *
 */
class ReservationTransferResult implements JsonSerializable
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
     * @var ReservationTransferDetail
     */
    private $reservationDetailTransfer = [];
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
     * Get the value of reservationDetailTransfer
     */ 
    public function getReservationDetailTransfer()
    {
        return $this->reservationDetailTransfer;
    }

    /**
     * Set the value of reservationDetailTransfer
     *
     * @return  self
     */ 
    public function setReservationDetailTransfer($reservationDetailTransfer)
    {
        $this->reservationDetailTransfer = $reservationDetailTransfer;

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
}