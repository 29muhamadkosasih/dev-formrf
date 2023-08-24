<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CustomKeywordValidation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Kata khusus yang harus ada dalam input
        $requiredKeyword = ['Cash', 'Transfer'];

        foreach ($requiredKeyword as $keyword) {
            if (stripos($value, $keyword) !== false) {
                return false; // Validasi gagal jika ditemukan kata khusus
            }
        }
    }


    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
