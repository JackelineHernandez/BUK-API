<?php 

namespace BukApi\Contracts\Engines;

/**
 * Interface IBaseEngine
   Interfaz de los engine encargados de la orquestación
 * @package BukApi\Contracts\Engines
 * @version March 14, 2018, 12:29 pm UTC
 *
 */
interface IBaseEngine {
	
	/**
	 * Se validará si hace falta este método, por ahora implementarlo vacio
	 */
    public function obtenerAcceso($key, $secret);
   
   /**
	 * - pricefrom/priceto: float
	 * - arrivalDate/departureDate: datetime
	 * - QtyProduct: es la cantidad del producto
	 * - QtyPax: es la cantidad de personas
	 * - others: es un json de pares clave:valor con los parametros adicionales de una categoria en particular. Ver Documentación de Servicio BuquedaController
    * Retorno:
    * Debe retornar un arreglo de objetos de tipo BusquedaResponse
	* 
	* origin/destination es de tipo caracter y corresponde al codigo IATA
	*/
    public function searchHotel($destination, $pricefrom = 0, $priceto = 0, $arrivalDate, $departureDate, $others);
	
	public function searchTransfer($destination, $pricefrom = 0, $priceto = 0, $arrivalDate, $departureDate, $QtyProduct = 1, $QtyPax = 1, $others = null);
	
	public function searchActivity($destination, $pricefrom = 0, $priceto = 0, $arrivalDate, $departureDate, $QtyProduct = 1, $QtyPax = 1, $others = null);
	
	/**
    * Recibe un arreglo de productos a buscar
    * Retorno:
    * Debe retornar un objeto de tipo BusquedaResponse
	* 
	*/

	public function makeReservations($reservaArray = []);

	public function makeTransferReservations($reservaArray = []);

	public function makeActivityReservations($reservaArray = []);

	/**
    *  @param Reserva $reserva
    * Retorno:
    * Debe retornar un objeto de tipo ReservaResponse
	* 
	*/
	public function hotelReservation($reserva);
    
	/**
	*  @param $idReservas
	*
    * Retorno:
    * Debe retornar un objeto de tipo ReservaResponse
	* 
	*/
	public function findReservation($idReservas);

	/**
	*  @param String $idReserva
    * Retorno:
    * Debe retornar un objeto de tipo ReservaResponse
	* 
	*/
	public function updateReservation($reserva, $idReserva);
    
	/**
	*  @param String $idReserva
    * Retorno:
    * Debe retornar un objeto de tipo ReservaResponse
	* 
	*/
	public function deleteReservation($idReserva);
	public function deleteTransferReservation($idReserva);
	public function deleteActivityReservation($idReserva);
    
}