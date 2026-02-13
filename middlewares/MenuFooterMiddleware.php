<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Psr\Http\Message\ResponseInterface as Response;

class MenuFooterMiddleware{
    public function __invoke(Request $request, RequestHandler $handler): Response{
        if($request->getMethod() == 'GET'){
            $page = PageConfigurator::instance()->getPage(); 
            $page->add('header', new Menu());
            $page->add('footer', new Footer());
        }
        return $handler->handle($request);
    }
}