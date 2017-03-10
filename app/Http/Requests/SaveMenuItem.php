<?php

namespace Clob\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveMenuItem extends FormRequest
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
            'menuable_type' => 'required',
            'menuable_id' => 'required_if:menuable_type,page',
            'label' => 'required',
            'url' => 'required_if:menuable_type,custom|url',
        ];
    }
}
