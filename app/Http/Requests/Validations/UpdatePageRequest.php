<?php

namespace App\Http\Requests\Validations;

use App\Http\Requests\Request;

class UpdatePageRequest extends Request
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
        $rules = [
      'title' => 'required',
      'content' => 'required',
      'image' => 'mimes:jpg,jpeg,png,gif,webp',
    ];

        if (! in_array($this->page, config('system.freeze.pages'))) {
            $rules['visibility'] = 'required';
        }

        return $rules;
    }
}
