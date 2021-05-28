<?php

namespace App\Http\Controllers;

use stdClass;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Contracts\Validation\Validator;


class AppBaseController extends Controller
{
    public function sendSuccess($result, $message)
    {
        return Response::json([
            'success' => true,
            'status_code' => 200,
            'message' => $message,
            "data"=> $result
        ], 200);
       
    }
    public function sendResponsePage($result,$total_page, $message)
    {
        return Response::json([
            'success' => true,
            'status_code' => 200,
            'total_item_count' => $total_page,
            'message' => $message,
            "data"=> $result
        ], 200);
       
    }
    public function sendError($message, $code = 404)
    {
        return Response::json([
            'success' => false,
            'status_code' => $code,
            'message' => $message,
            "data"=> new \stdClass()
        ], $code);
    }
      
    public function setValidationResponse($errors)
    {
        return [
            'success' => false,
            'status_code' => 200,
            'message' => "Validation run successfully!",
            "data"=> $errors
        ];
    }

    public function sendResponse($message,$flag,$result)
    {
        return Response::json([
            'success' => $flag,
            'status_code' => 200,
            'message' => $message,
            "data"=> $result
        ], 200);
    }

    public function unauthorized_response()
    {
        return Response::json([
            'status_code' => 401,
            'success' => false,
            'message' => "Authentication token has expired.",
            "data"=> new \stdClass()
        ], 401);
    }
}
