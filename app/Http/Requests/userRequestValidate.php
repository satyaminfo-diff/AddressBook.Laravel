<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Http\Requests\APIRequest;
class userRequestValidate extends APIRequest
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
     *  $atyaminf@
     */
    public function rules()
    {
        $rules=User::$rules;
        return $rules;
    }
  
}
