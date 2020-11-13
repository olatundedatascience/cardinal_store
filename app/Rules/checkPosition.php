<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\positions;

class checkPosition implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    private $rvalue = "";
    public function passes($attribute, $value)
    {
        
        $this->rvalue = $value;
        $find = positions::where('name', '=', $value)->first();

        if($find != null) {
            return false;
        }
        else {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->rvalue .' already exist';
    }
}
