<?php

namespace Clob\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SavePage extends FormRequest
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
            'title' => 'required',
            'slug' => [
                'nullable',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                Rule::unique('posts')->ignore($this->page ? $this->page->id : null)
            ],
            'markdown_content' => 'required',
            'seo_title' => 'max:60',
            'seo_description' => 'max:160',
            'seo_image_url' => 'nullable|url'
        ];
    }
}
