<?php

/**
 * Created by PhpStorm.
 * User: fhernandez
 * Date: 6/06/14
 * Time: 02:23 PM
 */

class ApiController extends BaseController {

    public function getCode(){
        $name = Input::get('name', '');
        $password = Input::get('password', '');
        $result = ApiClientUser::where('name', '=', $name)->first();
        $code = $result->getCode($password);
        return Response::json($code);
    }

} 