<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class CheckCorrectPassword implements Rule
{
    private $model;
    private  $email;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($class, $data)
    {
        $this->model = new $class();
        $this->email = $data['email'] ?? NULL;
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
        $check_data = $this->model::where('email' , $this->email)->first();
        if(empty($check_data)) return true;
        $password = $check_data->password;
        return (Hash::check($value, $password));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute is not correct';
    }
}
