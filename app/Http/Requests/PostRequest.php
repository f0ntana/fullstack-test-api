<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
    * Get the validation rules that apply to the re quest.
    *
    * @return array
    */
    public function rules()
    {
        return [
            'title' => 'required',
            'author' => 'required',
            'image_url' => 'required',
            'post' => 'required',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
