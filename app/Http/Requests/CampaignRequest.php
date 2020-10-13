<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CampaignRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->input('id');

        return [
            'name' => [
                'required',
            ],
            'description' => [
                'required',
            ],
            'url' => [
                'required',
            ],
            'objective' => [
                'required',
            ],
            'phone' => [
                'required',
            ],

        ];
    }

    /* public function messages()
    {
        return [
        ];
    }*/

}
