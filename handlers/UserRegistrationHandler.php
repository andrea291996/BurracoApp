<?php

class UserRegistrationHandler
{
    protected $last_errors;

    function __construct(){
        $this->last_errors=[];
    }

    function regsitraGiocatore($data){
        $email = isset($data['email'])?$data['email']:null;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $this->last_errors[]=INVALID_EMAIL;
        }
        $data['password']=self::encryptPassword($data['password']);
        $accountGiocatore = new Accountgiocatori();
        $data['hascompagno'] = 0;
        $data['hasrichieste'] = 0;
        $data['hasinviatorichiesta'] = 0;
        $accountGiocatore->copy($data);
        
        $idGiocatore = $accountGiocatore->insert();
        if($idGiocatore){
            return true;
        }else{
            return false;
        }
    }

    function registraCircolo($data){
        $email = isset($data['email'])?$data['email']:null;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $this->last_errors[]=INVALID_EMAIL;
        }
        $data['password']=self::encryptPassword($data['password']);
        $accountCircolo = new Accountcircoli();
        $accountCircolo->copy($data);
        $idCircolo = $accountCircolo->insert();
        if($idCircolo){
            return true;
        }else{
            return false;
        }
    }

    function getLastError(){
        return implode(" - ",$this->last_errors);
    }

    static function encryptPassword($password){
        $salt = "asd"; //SALT
        $pepper = "23dfv"; //PEPPER
        return md5($salt.$password.$pepper);
    }
}