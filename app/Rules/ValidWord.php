<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidWord implements Rule
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
        $genre = explode(',', trim($value));
        $existingGenres = [];

        foreach ($genre as $value) {
            if (in_array($value, $existingGenres)) {
                $existingGenres[] = [];
                return false;
            }
            $existingGenres[] = $value;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'already selected!';
    }
}
