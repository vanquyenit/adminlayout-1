<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class UserAddRequest extends FormRequest
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
            'txtUser'    => 'required|unique:users,username|min:5',
            'txtPass' => 'required',
            'txtRe_Pass' => 'required|same:txtPass',
            'txtEmail' => 'required|min:10|unique:users,email',
            'txtFullname' => 'required',
            'txtPhone' => 'required',
            'txtAddress' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'txtUser.required' => 'Vui lòng nhập UserName',
            'txtUser.unique' => 'UserName đã tồn tại',
            'txtUser.min' => 'UserName phải lớn hơn 5 ký tự',
            'txtPass.required' => 'Vui lòng nhập mật khẩu',
            'txtRe_Pass.required' => 'Vui lòng nhập lại mật khẩu',
            'txtRe_Pass.same' => '2 mật khẩu phải trùng nhau',
            'txtEmail.required' => 'Vui lòng nhập Email',
            'txtEmail.unique' => 'Email đã tồn tại',
            'txtFullname.required' => 'Vui lòng nhập tên đầy đủ',
            'txtPhone.required' => 'Vui lòng nhập số điện thoại',
            'txtAddress.required' => 'Vui lòng nhập địa chỉ',
        ];
    }
}
