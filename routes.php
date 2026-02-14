<?php

$routes = [];

//elenco delle rotte chiamate con GET
$routes['GET'] = [
    [
        'pattern' => '/',
        'callable' => 'HomeController:home',
    ],
    [
        'pattern' => '/registrazione',
        'callable' => 'UserRegistrationController:index',
    ],
    [
        'pattern' => '/login',
        'callable' => 'UserAccountController:login',
    ],
    [
        'pattern' => '/logout',
        'callable' => 'UserAccountController:logout',
    ],
    [
        'pattern' => '/contatti',
        'callable' => 'ContattiController:index'
    ]
];

$routes['POST'] = [
    [
        'pattern' => '/contatti',
        'callable' => 'ContattiController:post'
    ],
    [
        'pattern' => '/registragiocatore',
        'callable' => 'UserRegistrationController:registraGiocatore',
    ],
    [
        'pattern' => '/registracircolo',
        'callable' => 'UserRegistrationController:registraCircolo',
    ],
    [
        'pattern' => '/login',
        'callable' => 'UserAccountController:doLogin',
    ]
    
];


//elenco delle rotte chiamate con POST



//elenco delle rotte chiamate con PUT



//elenco delle rotte chiamate con DELETE
?>