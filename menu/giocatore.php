<?php
$username = $_SESSION['account']['nome'];
$menu = [
    "brand"=>[
        "href"=>"./",
        "title"=>"MVC"
    ],
    "items"=> [
            ["href"=>"./",
            "title"=>"Home"],
            ["href"=>"classifica",
            "title"=>"Classifica"],
            ["href"=>"caledario",
            "title"=>"Calendario"],
            ["href"=>"#",
            "title"=>"Ciao $username",
            "hasChilds"=>true,
            "isRight" => true,
            "childs"=>
            [
                ["href"=>"profilo",
                "title"=>"Profilo"],
                ["href"=>"squadra",
                "title"=>"La mia squadra"],
                ["href"=>"miepartite",
                "title"=>"Le mie partite"],
                ["isDivider"=>true],
                ["href"=>"logout",
                "title"=>"Logout"]
            ]
            ]
    ]
];

