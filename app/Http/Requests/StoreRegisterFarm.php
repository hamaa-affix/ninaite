<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterFarm extends FormRequest
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
            'name' => 'required|string|max:255',
            'postal_code' => 'required|string|max:30',
            'address1' => 'required|string|max:255',
            'address2' => 'required|string|max:255',
            'address3' => 'required|string|max:255',
            'tel' => 'required|string|max:20',
            'site_uri' => 'required|url',
            'summary' =>  'required|string|max:255',
            'content' =>  'required|string|max:255',
        ];
    }
}
