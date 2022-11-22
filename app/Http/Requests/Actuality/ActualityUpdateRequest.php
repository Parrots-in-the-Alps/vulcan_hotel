<?php

namespace App\Http\Requests\Actuality;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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

        $locales = ['en', 'it'];


        $rulesA = [];
        foreach ($locales as $locale) {
            $rulesA['title.' . $locale] = ['nullable', 'string'];
        }

        return [
            'title' => ['required', 'array'],
            'title.fr' => ['required', 'string'],
            'description' => ['required', 'array'],
        ] + $rulesA;



    }
}
