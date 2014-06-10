<?php
/**
 * Created by PhpStorm.
 * User: fhernandez
 * Date: 6/06/14
 * Time: 02:57 PM
 */

class ApiClientUser extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'api_client_user';

    /**
     * @description function to get the code to use the API
     * @param $name String Client user´s name
     * @param $psswrd String Client user's password
     * @return array With error and Message in case of error or code in case all info is correct.
     */
    public function getCode( $psswrd ){
        $code = array('error'=>true);
        var_dump($psswrd, $this->psswrd);
        if( $this->psswrd === $psswrd ){
            $code['error'] = false;
            $code['code'] = md5($this->name.$this->id_secret.floor(strtotime('now')/40));
        }
        else
            $code['message'] = 'La contraseña es incorrecta';
        return $code;
    }
} 