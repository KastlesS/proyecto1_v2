<?php
    //Creamos una función para ordenar elementos del array de proyectos de manera descendente.
    function ordenaTituloProyectoDesc($a, $b) {
        return strcmp($b['titulo'], $a['titulo']);
    }

    //Creamos una función para ordenar elementos del array de proyectos de manera ascendente.
    function ordenaTituloProyectoAsce($a, $b) {
        return strcmp($a['titulo'], $b['titulo']);
    }

   /*  function ordenaFechaProyectoDesc($a, $b) {
        return convertirFecha($b['fecha']) <=> convertirFecha($a['fecha']);
    }

    function ordenaFechaProyectoAsce($a, $b) {
        return convertirFecha($a['fecha']) <=> convertirFecha($b['fecha']);
    } */

    function obtenerCategoria($categorias,$proyecto){
        $categoria;
        foreach($categorias as $c){
            if($c['clave']==$proyecto['categoria']){
                $categoria = $c['nombre'];
            }
        }

        return $categoria;
    }

    function obtenerProyectos($categoria,$proyectos){
        $proyectos_filtrados = [];
        foreach($proyectos as $p){
            if($p['categoria'] == $categoria){
                $proyectos_filtrados[] = $p;
            }
        }
        return $proyectos_filtrados;
    }

    function borrarProyecto(&$proyectos, $clave){
        foreach ($proyectos as $i => $p) {
            if($p['clave']==$clave){
                unset($proyectos[$i]);
            }
        }
    }

    function fecha(){
        return date("d/m/Y");
    }

    function convertirFecha($proyecto){
        $proyecto['fecha']= strtotime($proyecto['fecha']);
        return $proyecto['fecha'];
    }

    function verificarUser($email,$pass,$users){
        $flag=false;
        foreach($users as $u){
            if($u['email']==$email && $u['password']==$pass){
                $flag=true;
                break;
            }
        }
        return $flag;
    }
?>