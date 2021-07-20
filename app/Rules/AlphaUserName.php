<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AlphaUserName implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        if (!is_string($value) && !is_numeric($value)) {
            return false;
        }

        return preg_match('/^(?:[\pL\pN\pM]+[\pZ\'_-])*[\pL\pN\pM]+$/u', $value) > 0;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return trans("validation.alpha_user_name");
    }
}
