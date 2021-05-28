<?php

namespace App\Http\Requests;

use Response;
use Illuminate\Support\Arr;
use App\Http\Controllers\AppBaseController;
use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class APIRequest extends FormRequest
{
    /**
     * validate response
     *
     * @return array
     *  $atyaminf@
     */
    protected function failedValidation(Validator $validator) {
       
        $errors=[];
        foreach($validator->errors()->toArray() as $key=>$value)
        {
            $errors[$key]=$value[0];
        }
        $valid_res=new AppBaseController;
        $validate_res=$valid_res->setValidationResponse($errors);
        throw new HttpResponseException(response()->json($validate_res, 200));
        
    }
}
