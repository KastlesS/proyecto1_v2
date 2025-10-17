<?php include_once ("datos.php")?>
<?php include_once ("utiles.php")?>
<!--DOCTYPE html -->
<html>
<head>
    <title>Portfolio de proyectos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/flatly/bootstrap.min.css" integrity="sha384-qF/QmIAj5ZaYFAeQcrQ6bfVMAh4zZlrGwTPY7T/M+iTTLJqJBJjwwnsE5Y0mV7QK" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<!-- https://radu.link/make-footer-stay-bottom-page-bootstrap/ -->
<body class="d-flex flex-column min-vh-100">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">Portfolio <?=fecha()?></span>
        </a>

        <ul class="nav nav-pills">
            <!-- Utilizamos un operador ternario con la variable global $_SERVER['SCRIPT_NAME'] para ver en qué página se encuentra el usuario y si está en la seleccionada el botón se mostrará con un fondo distintivo. Lo mismo para CATEGORIAS y CONTACTO-->
            <li class="nav-item"><a href="index.php" class="<?=($_SERVER['SCRIPT_NAME']=="/index.php")?"nav-link active":"nav-link"?>" aria-current="page">INICIO</a></li>
            <li class="nav-item">
                <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-bs-toggle="dropdown" aria-haspopup="true">
                    CATEGORÍAS
                    <span class="caret"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <?php
                        foreach($categoria as $c){
                            ?>
                                <a class="dropdown-item" href="index.php?categoria=<?=$c['clave']?>"><?=$c['nombre']?></a>
                            <?php
                        }
                    ?>
                </div>
            </li>
            <li class="nav-item"><a href="contacto.php" class="<?=($_SERVER['SCRIPT_NAME']=="/contacto.php")?"nav-link active":"nav-link"?>">CONTACTO</a></li>
            <?php
                //Verificamos que si la varible declarada en datos.php $loggedIn si es verdadera se mostrará en el header el apartado de ADMINISTRACIÓN
                if($loggedIn){
                    ?>
                        <li class="nav-item"><a href="contacto_lista.php" class="<?=($_SERVER['SCRIPT_NAME']=="/contacto_lista.php")?"nav-link active":"nav-link"?>">ADMINISTRACION</a></li>
                        <li class="nav-item"><a href="logout.php" class="nav-link">LOG OUT</a></li>
                    <?php
                }else{
                    ?>
                    <li class="nav-item"><a href="login.php" class="<?=($_SERVER['SCRIPT_NAME']=="/login.php")?"nav-link active":"nav-link"?>">LOGIN</a></li>
                    <?php
                }
            ?>
        </ul>
    </header>