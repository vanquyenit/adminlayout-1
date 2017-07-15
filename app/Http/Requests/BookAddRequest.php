<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookAddRequest extends FormRequest
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
            'txtBookName'    => 'required|unique:books,name|min:2'
        ];
    }

    public function messages()
    {
        return [
            'txtCateName.required' => 'Vui lòng nhập Thể Loại',
            'txtCateName.unique' => 'Thể loại đã tồn tại',
            'txtCateName.min' => 'Tên thể loại phải lớn hơn 2 ký tự'
        ];
    }
}
