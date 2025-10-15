<?php require_once ("datos.php")?>
<?php require_once ("utiles.php")?>
<?php include ("templates/header.php") ?>

<?php
    $proyecto;
    //Obtengo el proyecto procedente del index.php del usuario cuando ha hecho click.
    if(isset($_GET['proyecto'])){
        foreach($proyectos as $p){
            if($_GET['proyecto']==$p['clave']){
                $proyecto = $p;
            }
        }
    }
?>

<!-- Muestro todos los atributos del proyecto: -->
<div class="container">
    <h2>Título: <?=$proyecto['titulo']?></h2>
    <h4><a href="#">Año: <?=date("d/m/Y",convertirFecha($proyecto))?></a></h4>
    <span>Categorías: </span>
    <a href="index.php?categoria=<?=$proyecto['categoria']?>"><button class="btn btn-sm btn-default"><?=obtenerCategoria($categoria,$proyecto)?></button></a> <br> <br>
    <div class="row">
        <div class="col-sm">
            <img src="<?=(!empty($proyecto['imagen'])?$proyecto['imagen']:"static/images/default.jpg")?>" alt="<?=$proyecto['clave']?>" class="img-responsive" height="300" width="350" > <br>
        </div>

        <div class="col-sm">
            Descripción: <?=nl2br($proyecto['descripcion'])?>
        </div>
    </div>
    <div class="delete">
    <form action="index.php" method="POST">
        <button class="btn" type="submit" name="delete" value="<?=$proyecto['clave']?>">Borrar proyecto</button>
    </form>
</div>
</div>

<?php include ("templates/footer.php") ?>