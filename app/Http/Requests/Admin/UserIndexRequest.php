<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserIndexRequest extends FormRequest
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
            'filter.name' => 'sometimes|required|alpha_num',
            'page_size' => 'sometimes|required|numeric|max:100',
            'sort' => 'sometimes|required|in:name,-name,created_at,-created_at',
        ];
    }
}
