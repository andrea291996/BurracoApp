<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserRoleHandler{
    protected $last_errors;

    static function isAdmin(){
        $user = UserAccessHandler::getCurrentUser();
        $aid = $user ? $user['aid'] : null;
        if(!$aid){
            return false;
        }else{
            $sql = "SELECT r.rid FROM ruoli as r JOIN utenti_ruolo ur ON ur.rid = r.rid WHERE ur.aid = $aid and r.name = 'administrator';";
            //$bind = [$aid];
            $res = Database::instance()->query($sql);
            if(is_array($res) && isset($res[0])){
                return $res[0]['rid']>0;
            }else{
                return false;
            }
        }
    }
}