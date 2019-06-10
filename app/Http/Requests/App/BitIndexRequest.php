<?php

namespace App\Http\Requests\App;

use App\Platform;
use App\Rules\ParamsInArray;
use Illuminate\Foundation\Http\FormRequest;

class BitIndexRequest extends FormRequest
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
            'filter.difficult' =>  ['sometimes', 'required', new ParamsInArray(['easy', 'normal', 'hard'])],
            'filter.players' =>  ['sometimes', 'required', new ParamsInArray(['1', '2'])],
            'filter.rating' =>  ['sometimes', 'required', new ParamsInArray(['1', '2', '3', '4', '5'])],
            'filter.platform' => ['sometimes', 'required', new ParamsInArray(Platform::pluck('slug')->toArray())],
            'sort' => 'sometimes|required|in:latest,rating',
        ];
    }
}
