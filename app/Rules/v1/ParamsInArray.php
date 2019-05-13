<?php

namespace App\Rules\v1;

use Illuminate\Contracts\Validation\Rule;

class ParamsInArray implements Rule
{
    private $valid;

    /**
     * Create a new rule instance.
     *
     * @param $valid array
     */
    public function __construct(array $valid)
    {
        $this->valid = $valid;
    }

    /**
     * Determine if the validation rule passes.
     *
     * The input attribute is string like 'easy,normal,hard'
     * and every item should be presented in the $valid array
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $items = explode(',', $value);
        foreach ($items as $item) {
            if (!in_array($item, $this->valid)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute is not valid';
    }
}
