<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdate extends FormRequest
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
            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . \Auth::id(),
            'email' => 'required|email',
            'introduction' => 'max:80',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '用户名不能为空',
            'name.between' => '用户名长度范围为3 - 25',
            'name.regex' => '\'用户名只支持中英文、数字、横杆和下划线。',
            'name.unique' => '用户名已被占用',
            'email.required' => '邮箱不能为空',
            'email.email' => '邮箱格式有误',
            'introduction.max' => '个人简介最多包含80个字符',
        ];
    }
}
