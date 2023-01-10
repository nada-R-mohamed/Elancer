<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use PhpParser\Node\Stmt\Return_;

class ProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required','string','max:255'],
            'description' => ['required','string'],
            'type' => ['required','in:hourly,fixed'],
            'budget' => ['nullable' , 'numeric','min:0'],
        ];
    }

    public function messages()
    {

        return [

            'title.required' => 'Title is Required',
        ];
    }
}
