<?php

namespace App\Http\Requests;

use App\Rules\CheckBookingAvailability;
use Illuminate\Foundation\Http\FormRequest;

class ClientBookingReuqest extends FormRequest
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
            'name'=> ['required','max:255'],
            'address'=> ['required','max:255'],
            'email'=> ['required','email'],
            'phone'=> ['required','numeric','digits:10'],
            'checkin'=> ['required','after:today','date','before_or_equal:checkout',new CheckBookingAvailability],
            'checkout' => ['required','after:today','date','after_or_equal:checkin',new CheckBookingAvailability],
            

        ];

        return $rules;
    }

    public function messages(): array
    {
        return  [
            'required' => ':attribute Không được bỏ trống!',
            'max'=> ':attribute không được nhập quá :max ký tự!',
            'numeric'=> ':attribute phải là số!',
            'digits'=> ':attribute phải là :digits số!',
            'after'=> ':attribute không được chọn ngày đã qua!',
            'before_or_equal' =>'Thời gian :attribute phải trước hoặc bằng thời gian checkout',
            'after_or_equal'=>'Thời gian :attribute phải sau hoặc bằng thời gian checkin'
        ];
    }

    public function attributes():array
    {
        return [
            'name'=>'Tên',
            'address'=>'Địa chỉ',
            'email'=>'Email',
            'phone' =>'Số điện thoại',
            'checkin'=>'Checkin',
            'checkout'=>'Checkout',
        ];
    }
}
