<?php

$menu = [
    'brand'=>[
        'href'=>"./",
        'title'=>"Mio sito"
    ],
    'items'=> [
            ['href'=>"./",
            'title'=>"Home"],
            ['href'=>"#",
            'title'=>"Tendina",
            "hasChilds"=>true,
            'childs'=>
            [
                ["href"=>"esempio1",
                "title"=>"Esempio 1"],
                ["href"=>"esempio2",
                "title"=>"Esempio 2"],
                ["isDivider"=>true],
                ["href"=>"esempio3",
                "title"=>"Esempio 3"]
            ]
            ],
            ['href'=>"contatti",
            'title'=>"Contatti"],
            ['href'=>"login",
            'title'=>"Accedi",
            "isRight" => true],
            ['href'=>"registrazione",
            'title'=>"Registrati",
            "isRight" => true]
    ]
];