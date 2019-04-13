<?php

namespace BukApi\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use BukApi\Constants\ValidationRule;

class CreateReservationTransferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return ValidationRule::CREATE_RESERVATION_TRANSFER;
    }
}
