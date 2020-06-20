<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckExistIdRecord implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $model;

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
       return (!empty($this->model->whereId($value)->first()));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute does not exist';
    }
}
