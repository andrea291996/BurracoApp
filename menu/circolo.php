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

