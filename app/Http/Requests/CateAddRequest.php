<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateAddRequest extends FormRequest
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
            'txtCateName'    => 'required|unique:categories,name|min:2'
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
