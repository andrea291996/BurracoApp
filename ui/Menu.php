<?php 

class Menu extends PageElement{

    function __construct($template= "ui/menu", $data= []){
        if(count($data)==0){
            if(UserAccessHandler::tipologiaUtente() == "giocatore"){
                include __DIR__."/../menu/giocatore.php";
            }elseif(UserAccessHandler::tipologiaUtente() == "circolo"){
                include __DIR__."/../menu/circolo.php";
            }else{
                include __DIR__."/../menu/menu.php";
            }
            $data = $menu;
        }
        parent::__construct($template, $data);
    }
}