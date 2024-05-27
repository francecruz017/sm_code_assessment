<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Carbon\Carbon;

class AdultAge implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $birthdate = Carbon::createFromFormat('Y-m-d', $value);
        $age = $birthdate->age;

        if (false === $age >= 18) {
            $fail('Age should be 18 or above.');
        }
    }
}
