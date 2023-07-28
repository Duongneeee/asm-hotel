<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
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
            'name' => 'required|max:255|unique:hotels,name',
            'address'=>'required|max:255',
            'description'=>'required',
        ];

        if(!empty($this->route()->hotel->id)){
            $id = $this->route()->hotel->id;
            $rules['name'] = 'required|max:255|unique:hotels,name,'.$id;
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute Không được bỏ trống!',
            'max' => ':attribute Không được quá :max ký tự!',
            'unique'=> ':attribute đã tồn tại!'
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Tên',
            'address' => 'Địa chỉ',
            'description' => 'Mô tả',
        ];
    }
}
