<?php session_start(); ?>
<?php
    $nombreCompleto = "Iván Castillo Simón";

    $datos_proyectos = json_decode(file_get_contents("proyectos.json"), true);
    $proyectos = $datos_proyectos['proyectos'];

    $datos_users = json_decode(file_get_contents("usuarios.json"), true);
    $usuarios = $datos_users['usuarios'];

    $categoria = [
        [
            "clave" => "categoria1",
            "nombre" => "Tecnología",
        ],
        [
            "clave" => "categoria2",
            "nombre" => "Deportes",
        ],
        [
            "clave" => "categoria3",
            "nombre" => "Entretenimiento",
        ],
        [
            "clave" => "categoria4",
            "nombre" => "Moda",
        ],
        [
            "clave" => "categoria5",
            "nombre" => "Transporte",
        ],
    ];
    $loggedIn=false;
    if(isset($_SESSION['user_email'])){
        $loggedIn=true;
    }

?>
