<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorAddRequest extends FormRequest
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
            'txtAuthor' => 'required|unique:authors,name|min:2',
            'txtDescription'    => 'required'
        ];
    }

    public function messages()
    {
        return [
            'txtAuthor.required' => 'Vui lòng nhập Tên Tác Giả',
            'txtAuthor.unique' => 'Tên Tác Giả đã tồn tại',
            'txtDescription.required' => 'Vui Lòng nhập mô tả cho tác giả'
        ];
    }
}
