<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
        //ovo mora biti tru da bismo menjali requestove
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // return [
        //     'title' => 'required|unique:title|max:255',
        //     'director' => 'required',
        //     'duration' => 'required|numeric|min:1|max:500',
        //     'releaseDate' => 'required|unique:releaseDate',
        //     'imageUrl' => 'url'
        // ];
    }
}


