<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class RoomRequest extends FormRequest
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
            'name' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif',
            'description' => 'required',
            'status' => 'required',
            'hotel_id'  => 'required',
            'roomtype_id'  => 'required',
        ];

        if(!empty($this->route()->room->id)){
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
        return  [
            'required' => ':attribute không được bỏ trống!',
            'max' => ':attribute không được vượt quá :max ký tự!',
            'image' => 'Không phải :attribute',
            'mimes' => ':attribute không đúng định dạng!',

        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Tên phòng',
            'image' => 'Hình ảnh',
            'description' => 'Mô tả',
            'status' => 'Trạng thái',
            'hotel_id' => 'Khách sạn',
            'roomtype_id' => 'Loại phòng',
        ];
    }
}
