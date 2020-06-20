<?php

namespace App\Http\Requests;

use App\Rules\OnlyUniqueCaseInsensetiveString;
use Illuminate\Foundation\Http\FormRequest;
use App\News;

class NewsDataStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           'title' => ['required', 'max:120', new OnlyUniqueCaseInsensetiveString(News::class)],
           'description' => ['required']
        ];
    }
}
