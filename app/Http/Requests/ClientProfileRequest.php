<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientProfileRequest extends FormRequest
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
        $user =Auth::user();
        $rules=[];
        if($this->image){
            if($this->password || $this->current_password){
                $rules = [
                    'current_password' => ['required',function($attibute,$value,$fail) use($user){
                        if(!Hash::check($value,$user->password)){
                            $fail('Mật khẩu hiện tại không đúng!');
                        }
                    }],
                    'password'=>['required','min:8','confirmed'],
                    'password_confirmation'=>['required'],
                    'image'=>['image','mimes:jpeg,jpg,png,gif']
                ];
            }else{
                $rules = [
                    'image'=>['image','mimes:jpeg,jpg,png,gif']
                ];
            }
        }else{
            if($this->password || $this->current_password){
                $rules = [
                    'current_password' => ['required',function($attibute,$value,$fail) use($user){
                        if(!Hash::check($value,$user->password)){
                            $fail('Mật khẩu hiện tại không đúng!');
                        }
                    }],
                    'password'=>['required','min:8','confirmed'],
                    'password_confirmation'=>['required']
                ];
        
            }
        }
        
        return $rules;
    }

    public function messages():array{
        return[
            'required'=>':attribute Không được bỏ trống!',
            'min'=>':attribute thối thiểu :min ký tự!',
            'confirmed'=> 'Xác nhận mật khẩu mới không chính xác',
            'image' =>'Không phải hình ảnh',
            'mimes'=>':attribute không đúng định dạng'
        ];
    }

    public function attributes():array
    {
        return [
            'current_password'=>'Mật khẩu hiện tại',
            'password'=>'Mật khẩu',
            'password_confirmation'=>'Xác nhận mật khẩu',
            'image'=>'Hình ảnh'
        ];
    }
}
