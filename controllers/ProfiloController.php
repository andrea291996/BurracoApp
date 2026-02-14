<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ProfiloController extends Controller{
    
    function mostraProfilo(Request $request, Response $response, $args) {    
        $page = PageConfigurator::instance()->getPage(); 
        $page->setTitle("Profilo");
        $data = $this->getAccount();
        $page->add("content", new ProfiloView("ui/profilo", $data));
        return $response;
        }  
    
        static function getAccount(){
            $tipologiaUtente = $_SESSION['account']['tipologia'];
                if($tipologiaUtente == "giocatore"){
                    $accountGiocatore = new Accountgiocatori();
                    $accountGiocatore->copy($_SESSION['account']);
                    $data = $accountGiocatore;
                }elseif($tipologiaUtente == "circolo"){
                    $accountCircoli = new Accountcircoli();
                    $accountCircoli->copy($_SESSION['account']);
                    $data = $accountCircoli;
                }
        return $data;
        }
}

