<?php

namespace App\Rules;

use Closure;
use App\Models\Booking;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckBookingAvailability implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $checkin = $attribute === 'checkin' ? $value : request('checkin');
        $checkout = $attribute === 'checkout' ? $value : request('checkout');

        $isAvailable = !Booking::where(function ($query) use ($checkin, $checkout) {
            $query->whereBetween('checkin', [$checkin, $checkout])
                  ->orWhereBetween('checkout', [$checkin, $checkout])
                  ->orWhere(function ($query) use ($checkin, $checkout) {
                      $query->where('checkin', '<=', $checkin)
                            ->where('checkout', '>=', $checkout);
                  });
        })->exists();

        // Nếu ngày đã được đặt, đánh dấu là không hợp lệ bằng cách ném exception
        if (!$isAvailable) {
            $fail('Ngày đã được đặt. Vui lòng chọn ngày khác!');
        }

    }
}
