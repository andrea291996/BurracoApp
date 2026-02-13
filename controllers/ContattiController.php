<?php 

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ContattiController extends Controller {

    public function index(Request $request, Response $response, $args){
        $page = PageConfigurator::instance()->getPage(); 
        $page->setTitle("Contatti");
        $page->add("content", new ContattiView());
        return $response;
    }

    public function post(Request $request, Response $response, $args){
        $data = $request->getParsedBody();
        $email = $data["email"];
        $message = $data["message"];
    
        if(empty($message)){
            UIMessage::setError(EMPTY_MESSAGE);
            return $response->withHeader("Location", "./contatti")->withStatus(302);
        }

        if(empty($email)){
            UIMessage::setError(EMPTY_EMAIL);
            return $response->withHeader("Location", "./contatti")->withStatus(302);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           UIMessage::setError(INVALID_EMAIL);
            return $response->withHeader("Location", "./contatti")->withStatus(302);
        }

        $file = getcwd()."/messages/contatti.json"; 
        $data = [];

        if(file_exists($file)){ 
            $messages = file_get_contents($file); 
            $data = json_decode($messages, true); 
        }

        $curDate = date("Y-m-d H:i:s");
        $newdata = ['email' => $email, 'message' => $message, 'date' => $curDate, 'active' => 'yes'];
        array_push($data, $newdata); 
        $contact = json_encode($data); 
        file_put_contents($file, $contact); 
        UIMessage::setSuccess(MESSAGE_SENT_SUCCESS);
        return $response->withHeader("Location", "./contatti")->withStatus(302);
    }
    
}