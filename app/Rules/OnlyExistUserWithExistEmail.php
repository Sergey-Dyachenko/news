<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class OnlyExistUserWithExistEmail implements Rule
{
    private $model;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($class)
    {
        $this->model = new $class();
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
        $check_data = $this->model::where('email', $value)->first();
        if (empty($check_data)) return false;
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute does not exist';
    }
}
