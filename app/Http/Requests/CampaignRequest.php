<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'objective' => [
                'required',
            ],
            'url' => [
                'required',
            ],
            'phone' => [
                'required',
            ],
            'ad_schedule' => [
                'required',
            ],
            'locations' => [
                'required',
            ],
            'apply_billing' => [
                'required',
            ],
            'mode' => [
                'required',
            ],
            'type' => [
                'required',
            ],
            'monthly_cost' => [
                'required',
            ],
            'daily_cost' => [
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
