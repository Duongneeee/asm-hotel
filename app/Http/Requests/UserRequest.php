<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        

        $rules =[
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' =>   ['required', 'min:8'],
            'phone' => ['required', 'numeric', 'digits:10'],
            'gender' => ['required'],
            'address' => ['required'],
            'role_id' => ['required']
        ];
        if (!empty($this->route()->user->id)) {
            $id = $this->route()->user->id;
            $rules['email'] = ['required', 'email', 'max:255', 'unique:users,email,' . $id];
            if ($this->password) {
                $rules['password'] = ['min:8'];
            }else{
                unset($rules['password']);
            }
        }
        return $rules;
    }

    public function messages(): array
    {
        return [
            'required' => ' :attribute không được bỏ trống!',
            'max' => ' :attribute đã vượt quá :max ký tự! ',
            'email' => ' :attribute không đúng định dạng!',
            'unique' => ' :attribute đã tồn tại!',
            'min' => ' :attribute tối thiểu :min ký tự!',
            'numeric' => ':attribute phải là số!',
            'digits' => ':attribute phải là :digits số'

        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'phone' => 'Số điện thoại',
            'gender' => 'Giới tính',
            'address' => 'Địa chỉ',
            'role_id' => 'Quyền'
        ];
    }
}
