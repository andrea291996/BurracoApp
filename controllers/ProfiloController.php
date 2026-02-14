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

    function visualizzaPaginaModificaProfiloGiocatore(Request $request, Response $response, $args){
        
        $page = PageConfigurator::instance()->getPage(); 
        $page->setTitle("Modifica Profilo");
        $account = $this->getAccount();
        $profilo = new Profiligiocatori();
        $profilo->select(['idaccountgiocatore'=>$account->getidgiocatore()]);
        
        $page->add("content", new ModificaProfiloGiocatoreView("ui/modificaprofilogiocatore", $profilo));
        return $response;
    }

    function visualizzaPaginaModificaProfiloCircolo(Request $request, Response $response, $args){
        
        $page = PageConfigurator::instance()->getPage(); 
        $page->setTitle("Modifica Profilo");
        $account = $this->getAccount();
        $profilo = new Profilicircoli();
        $profilo->select(['idaccountcircolo'=>$account->getidcircolo()]);

        
        $page->add("content", new ModificaProfiloCircoloView("ui/modificaprofilocircolo", $profilo));
        return $response;
    }

    function modificaProfiloGiocatore(Request $request, Response $response, $args){
        
        $data = (array)$request->getParsedBody();
        $account = $this->getAccount();
        $profilo = new Profiligiocatori();
        //se non esiste
        if(!$profilo->select(['idaccountgiocatore'=>$account->getidgiocatore()])){
            $profilo->setidaccountgiocatore($account->getidgiocatore());
            $profilo->setindirizzo($data['indirizzo']);
            $profilo->setdistanzanoninquinanteinmetri($data['distanzamassima']);
            $profilo->insert();
        }else{
            //se esiste
            $profilo->setidaccountgiocatore($account->getidgiocatore());
            $profilo->setindirizzo($data['indirizzo']);
            $profilo->setdistanzanoninquinanteinmetri($data['distanzamassima']);
            $profilo->update();
        }
        
        return $response->withHeader("Location", "./profilo")->withStatus(302);

    }

    function modificaProfiloCircolo(Request $request, Response $response, $args){
        $data = (array)$request->getParsedBody();
        $account = $this->getAccount();
        $profilo = new Profilicircoli();
    
        //se non esiste
        if(!$profilo->select(['idaccountcircolo'=>$account->getidcircolo()])){
            $profilo->setidaccountcircolo($account->getidcircolo());
            $profilo->setindirizzo($data['indirizzo']);
            $profilo->insert();
        }else{
            //se esiste
            $profilo->setidaccountcircolo($account->getidcircolo());
            $profilo->setindirizzo($data['indirizzo']);
            $profilo->update();
        }
        
        return $response->withHeader("Location", "./profilo")->withStatus(302);
    }
}

