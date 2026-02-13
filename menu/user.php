<?php
$username = $_SESSION['account']['username'];
$menu = [
    "brand"=>[
        "href"=>"./",
        "title"=>"MVC"
    ],
    "items"=> [
            ["href"=>"./",
            "title"=>"Home"],
            ["href"=>"#",
            "title"=>"Tendina",
            "hasChilds"=>true,
            "childs"=>
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
            ["href"=>"contatti",
            "title"=>"Contatti"],
            ["href"=>"#",
            "title"=>"Ciao $username",
            "hasChilds"=>true,
            "isRight" => true,
            "childs"=>
            [
                ["href"=>"profilo",
                "title"=>"Profilo"],
                ["href"=>"impostazioni",
                "title"=>"Impostazioni"],
                ["isDivider"=>true],
                ["href"=>"logout",
                "title"=>"Logout"]
            ]
            ]
    ]
];

