<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecruitment extends FormRequest
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
            'title' => 'required|string|max:25',
            'summary' =>  'required|string|max:255',
            'content' =>  'required|string|max:255',
            'status' => 'required',
            'img_name' => ['file', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2000'], 
        ];
    }
}
