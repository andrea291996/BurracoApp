<?php
$username = $_SESSION['account']['nome'];
$menu = [
    "brand"=>[
        "href"=>"./",
        "title"=>"Circolo"
    ],
    "items"=> [
            ["href"=>"./",
            "title"=>"Home"],
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
                ["isDivider"=>true],
                ["href"=>"logout",
                "title"=>"Logout"]
            ]
            ]
    ]
];

