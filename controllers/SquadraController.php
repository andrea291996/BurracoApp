<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class SquadraController extends Controller{
    
    function squadra(Request $request, Response $response, $args) {    
        $page = PageConfigurator::instance()->getPage(); 
        $page->setTitle("La mia squadra");
        $db = Database::instance();
        $account = ProfiloController::getAccount();
        $idcompagno = $account->getidcompagno();

        //HO UN COMPAGNO
            //mostracompagno

        //HO INVIATO UNA RICHIESTA
            //mostra stato richiesta

        //HO DELLE RICHIESTE
            //mostrarichieste
        
        //NON HO RICHIESTE E NON HO COMPAGNI
            //mostra possiibili compagni 
            if($idcompagno == null){
                $risultati = $db->select(
                    "accountgiocatori", [],["idcompagno" => null, "idgiocatore" => ["!=", $account->getidgiocatore()]]);  
                $listaCompagni = [];
                
                foreach ($risultati as $row) {
                    $account = new Accountgiocatori();
                    $account->copy($row);
                    $listaCompagni[] = $account;
                }
                    $page->add("content", new SquadraView("ui/cercacompagno", ["compagni"=>$listaCompagni]));
                    return $response;
            }
            /*
            if($hasrichieste){
                $db = Database::instance();
                $risultati = $db->select(
                    "accountgiocatori", [],["hasinviatorichiesta" => 0,"idgiocatore" => ["!=", $account->getidgiocatore()]]);  
                $listaCompagni = [];
                foreach ($risultati as $row) {
                    $account = new Accountgiocatori();
                    $account->copy($row);
                    $listaCompagni[] = $account;
                }
                    $page->add("content", new SquadraView("ui/cercacompagno", ["compagni"=>$listaCompagni]));
                    return $response;
            }*/
        $page->add("content", new SquadraView("ui/squadra"));
        return $response;
        }
        
}

