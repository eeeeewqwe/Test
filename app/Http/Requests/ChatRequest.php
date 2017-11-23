<?php

namespace app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChatRequest extends FormRequest
{
    public function rules(){
        return [
            'message' => 'string',
            'file' => 'string'
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [

        ];
    }
}