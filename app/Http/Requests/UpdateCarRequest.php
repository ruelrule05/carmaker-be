<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
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
        return [
            'name'              =>  ['required'],
            'manufacturer_id'   =>  ['required', 'exists:manufacturers,id'],
            'color_id'          =>  ['required', 'exists:colors,id'],
            'car_type_id'       =>  ['required', 'exists:car_types,id']
        ];
    }
}
