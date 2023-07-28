<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
        return [
            'name' => ['required','max:255'],
            'email' => ['required', 'email'],
            'phone' => ['required','numeric','digits:10'],
            'checkin' => ['required'],
            'checkout' => ['required'],
            'rooms' => ['required'],
        ];
    }

    public function messages():array
    {
        return [
            'required'=>':attribute không được bỏ trống!',
            'max'=> ':attribute không vượt quá :max ký tự!',
            'email'=> ':attribute không đúng định dạng',
            'numeric'=>':attribute phải là số',
            'digits'=>':attribute phải đủ :digits',
            // 'date_format'=>':attribute không đúng định dạng',
        ];
    }

    public function attributes():array
    {
        return [
            'name' => 'Tên',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'checkin' => 'Checkin',
            'checkout' => 'Checkout',
            'rooms' => 'Số phòng',
        ];
    }
}
