<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomtypeRequest extends FormRequest
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
            'name' => 'required|max:255|unique:roomtypes,name',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif',
            'description' => 'required',
        ];

        if(!empty($this->route()->roomtype->id)){
            $id = $this->route()->roomtype->id;
            $rules['name'] = 'required|max:255|unique:roomtypes,name,'.$id;
            if($this->image){
                $rules['image'] = 'image|mimes:jpeg,jpg,png,gif';
            }else{
                unset($rules['image']);
            }
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute không được bỏ trống!',
            'unique' => ':attribute đã tồn tại!',
            'max'=> ':attibute không quá :max ký tự!',
            'numeric' => ':attribute phải là số!',
            'image'=> 'Không phải là :attribute !',
            'mimes'=> ':attribute không đúng định dạng!',
            
        ];
    }

    public function attributes(): array{
        return [
            'name' => 'Tên',
            'price' => 'Giá',
            'image' => 'Hình ảnh',
            'description' => 'Mô tả',
        ];
    }
}
