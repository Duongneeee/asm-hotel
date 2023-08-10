<?php

namespace App\Rules;

use Closure;
use App\Models\Discount;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Request;

class CheckDiscount implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value,Closure $fail): void
    {
        $discount = Discount::where('code', $value)
            ->where('start', '<=', now())
            ->where('end', '>=', now())
            ->first();

        if (!$discount) {
            $fail('Mã code giảm giá không tồn tại hoặc đã hết!');
        }
    }
}
