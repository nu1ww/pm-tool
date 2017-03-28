<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    protected $statusCode=200;
    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
    /**
     * @param mixed $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }
    public function responseNotFound($message='Not Found'){
        return $this->setStatusCode(Response::HTTP_NOT_FOUND)->respondWithError($message);
    }
    public function respond($data,$header=[]){
        return response()->json($data,$this->getStatusCode(),$header);
    }
    public function respondWithError($message){
        return response()->json([
            'error'=>[
                'message'=>$message,
                'status_code'=>$this->getStatusCode()
            ]
        ]);
    }
    public function responseInternalError($message='Not Found'){
        return $this->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
    }
}
