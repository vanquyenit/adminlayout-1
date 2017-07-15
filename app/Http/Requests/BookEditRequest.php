<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookEditRequest extends FormRequest
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

    public function rules()
    {
        return [
            'txtBookName'    => 'required|min:2'
        ];
    }

    public function messages()
    {
        return [
            'txtBookName.required' => 'Vui lòng nhập Tên sách',
            'txtBookName.min' => 'Tên sách phải lớn hơn 2 ký tự'
        ];
    }
}
