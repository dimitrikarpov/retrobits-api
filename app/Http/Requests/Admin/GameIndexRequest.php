<?php

namespace App\Http\Requests\Admin;

use App\Platform;
use App\Rules\ParamsInArray;
use Illuminate\Foundation\Http\FormRequest;

class GameIndexRequest extends FormRequest
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
            'filter.platform' => ['sometimes', 'required', new ParamsInArray(Platform::pluck('slug')->toArray())],
            'sort' => 'sometimes|required|in:title,-title'
        ];
    }
}
