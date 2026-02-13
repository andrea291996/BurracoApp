<?php 

class Menu extends PageElement{

    function __construct($template= "ui/menu", $data= []){
        if(count($data)==0){
            if(UserAccessHandler::isLogged()){
                include __DIR__."/../menu/user.php";
            }else{
                include __DIR__."/../menu/menu.php";
            }
            $data = $menu;
        }
        parent::__construct($template, $data);
    }
}