<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserAccessHandler{
    protected $last_errors;

    function __construct(){
        $this->last_errors=[];
    }

    function login($email, $password){
        if(empty($password)){
            $this->last_errors[] = EMPTY_PASSWORD;
        }

        if(empty($email)){
            $this->last_errors[] = INVALID_EMAIL;
        }

        if(count($this->last_errors)){
            return false;
        }

        $enc = UserRegistrationHandler::encryptPassword($password);
        $account = new Accountgiocatori();
        if($account->select(['email'=>$email, 'password'=>$enc])){
            $_SESSION['account'] = $account -> toArray();
        }else{
            $account = new Accountcircoli();
            if($account->select(['email'=>$email, 'password'=>$enc])){
                $_SESSION['account'] = $account -> toArray();
            }else{
                $this->last_errors[] = INVALID_EMAIL_OR_PASSWORD;
                return false;
            }
        }
        return true;
    }

    function logout(){
        unset($_SESSION['account']);
        session_destroy();
        session_start();
    }

    function getLastError(){
        return implode(" - ",$this->last_errors);
    }

    static function isLogged(){
        return isset($_SESSION['account']);
    }

    static function getCurrentUser(){
        return isset($_SESSION['account']) ? $_SESSION['account'] : null;
    }
}