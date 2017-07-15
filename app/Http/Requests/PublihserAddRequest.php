<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublihserAddRequest extends FormRequest
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
            'txtPublisher' => 'required|unique:authors,name|min:2',
            'txtDescription'    => 'required'
        ];
    }

    public function messages()
    {
        return [
            'txtPublisher.required' => 'Vui lòng nhập Tên Nhà Phát Hành',
            'txtPublisher.unique' => 'Tên Nhà Phát Hành đã tồn tại',
            'txtDescription.required' => 'Vui Lòng nhập mô tả cho Nhà Phát Hành'
        ];
    }
}
