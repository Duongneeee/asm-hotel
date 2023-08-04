<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
    
        $rules = [
            'name' => 'required|unique:roles,name',
        ];

        if(!empty($this->route()->role->id)){
            $rules['name'] = 'required|unique:roles,name,'.$this->route()->role->id;
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên không được bỏ trống!',
            'name.unique' => 'Tên đã tồn tại!',
        ];
    }
}
