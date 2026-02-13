<?php

class UserRegistrationHandler
{
    protected $last_errors;

    function __construct(){
        $this->last_errors=[];
    }

    function profile($uid){
        $utente = new Utenti();
        if($utente->select(['iud'=>$uid]))
            {
                $account = new Account();
                if($account->select(['uid'=>$utente->getuid()]))
                    return ['account'=>$account,"utente"=>$account];
            }
            return null;
    }

    function registration(array $data){
        $email = isset($data['email'])?$data['email']:null;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $this->last_errors[]=INVALID_EMAIL;
        }
        $data['password']=self::encryptPassword($data['password']);
        
        $account = new Account();
        $account->copy($data);
        $utente = new Utenti();
        $utente->copy($data);
        $uid = $utente->insert();

        if($uid){
            $utente->setuid($uid);
            $utente->update();
            $account->setuid($uid);
           
            if($account->insert())
                return true;
            else
                {
                $utente->delete();
            }
        }
        return false;
    
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