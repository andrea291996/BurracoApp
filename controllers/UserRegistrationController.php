<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserRegistrationController extends Controller {
    function index(Request $request, Response $response, $args) { 
        $page = PageConfigurator::instance()->getPage();
        $page->setTitle("Registrazione Utente");
        $page->add("content", new UserRegistrationView());
        $page->add("js", ["script"=>"templates/script/formRegistrazione.js"]);
        return $response;
    }

    function registration (Request $request, Response $response, $args) {
        $data = (array)$request->getParsedBody();
        $handler = new UserRegistrationHandler();
        if($handler->registration($data)){
            UIMessage::setSuccess(REGISTRATION_SUCCESS);
        }else{
            
            UIMessage::setError(REGISTRATION_FAILED);
        }
        return $response->withHeader("Location", "./registrazione")->withStatus(302);
    }

}