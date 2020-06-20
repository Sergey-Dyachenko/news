<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class OnlyUniqueCaseInsensetiveString implements Rule
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
    private function ToLowerCase($n)
    {
        return strtolower($n);
    }

    private function getArrayTitles()
    {
        $titles = $this->model->get()->pluck('title')->toArray();
        $toLowerCase = function ($array_item){
            return strtolower($array_item);
        };
        return array_map($toLowerCase, $titles);

    }

    public function passes($attribute, $value)
    {
        $valueToLowerCase = strtolower($value);
        return !in_array($valueToLowerCase, $this->getArrayTitles());
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute already exist in database';
    }
}
