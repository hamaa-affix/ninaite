<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFarmData extends FormRequest
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
            'site_url' => 'required|url',
            'summary' =>  'required|string|max:255',
        ];
    }
    
     public function messages()
      {
        return [
            'name.required' => '農園名を入力してください',
            'name.string' => '農園名は文字列で入力してください',
            'name.max' => '農園名は255文字以内で入力してください',
            'postal_code.required' => '郵便を入力してくだい',
            'postal_code.string' => '郵便番号を入力してください',
            'postal_code.max' => '郵便番号は255字以内で入力してください',
            'address1.required' => '都道府県を入力を入力してください',
            'address1.string' => '文字列で入力してください',
            'address1.max' => '入力数は255までで入力してください',
            'address2.required' => '市町村を入力してください',
            'address2.string' => '文字列で入力してください',
            'address2.max' => '入力数は255までで入力してください',
            'address3.required' => '番地、マンション名を入力してください',
            'address3.string' => '文字列で入力してください',
            'address3.max' => '入力数は255までで入力してください',
            'tel.required' => '電話番号を入力してください',
            'tel.string' => '電話番号は数字でお願いします',
            'tel.max' => '20字以内で入力してください',
            'site_url.required' => 'urlを入力してください',
            'site_url.url' => 'urlを入力してください',
            'summary.required' => '事業内容を入力してください',
            'summary.string' => '事業内容は文字列入力でお願いします',
            'summary.max' => '事業内容は最大255字まででお願いします',
        ];
      }

}
