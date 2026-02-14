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
        'pattern' => '/profilo',
        'callable' => 'ProfiloController:mostraProfilo',
    ],
    [
        'pattern' => '/squadra',
        'callable' => 'SquadraController:squadra',
    ],
    [
        'pattern' => '/modificaprofilogiocatore',
        'callable' => 'ProfiloController:visualizzaPaginaModificaProfiloGiocatore',
    ],
    [
        'pattern' => '/modificaprofilocircolo',
        'callable' => 'ProfiloController:visualizzaPaginaModificaProfiloCircolo',
    ]
];

$routes['POST'] = [
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
    ],
    [
        'pattern' => '/modificaprofilogiocatore',
        'callable' => 'ProfiloController:modificaProfiloGiocatore',
    ],
    [
        'pattern' => '/modificaprofilocircolo',
        'callable' => 'ProfiloController:modificaProfiloCircolo',
    ]
    
    
];


//elenco delle rotte chiamate con POST



//elenco delle rotte chiamate con PUT



//elenco delle rotte chiamate con DELETE
?>