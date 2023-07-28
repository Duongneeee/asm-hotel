<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
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
            'code' => 'required|unique:discounts,code',
            'start' => 'required',
            'end' => 'required',
            'price' => 'required|numeric',
            'value' => 'required'
        ];

        if (!empty($this->route()->discount->id)) {
            $id = $this->route()->discount->id;
            $rules['code'] = 'required|unique:discounts,code,' . $id;
        }
        return $rules;
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute không được bỏ trống!',
            'unique' => ':attribute đã tồn tại!',
            'mumeric' => ':attribute phải là số'
        ];
    }

    public function attributes(): array
    {
        return [
            'code' => 'Mã giảm giá',
            'start' => 'Ngày bắt đầu',
            'end' => 'Ngày kết thúc',
            'price' => 'Giá giảm',
            'value' => 'Đơn vị'
        ];
    }
}
