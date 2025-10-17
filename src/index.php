<?php session_start(); ?>
<!-- Incluimos todos los archivos que necesitamos (header.php, datos.php, utiles.php y footer.php)-->
<?php require_once ("datos.php")?>
<?php require_once ("utiles.php")?>
<?php include ("templates/header.php") ?>

<?php
    //Con un if verificamos que el usuario ha utilizado el formulario de ordenar los proyectos por título.
    if(isset($_GET['sort'])){
        //Mediante un switch obtenemos el resultado del formulario y dependiendo de éste utilizamos una función u otra.
        switch ($_GET['sort']) {
            case 'sortDes':
                usort($proyectos,"ordenaTituloProyectoDesc");
                    break;
            case 'sortAsc':
                usort($proyectos,"ordenaTituloProyectoAsce");
                    break;
            /* case '-1':
                usort($proyectos, "ordenaFechaProyectoDesc");
                    break;
            case '1':
                usort($proyectos, "ordenaFechaProyectoAsce"); */
            default: "";
        }
    }

    if(isset($_POST['delete'])){
        borrarProyecto($proyectos,$_POST['delete']);
    }
?>

<div class="proyectos">
    <?php
        if(!isset($_GET['categoria'])){
            //Mediante un foreach recorremos el array de proyectos y creamos un div para cada proyecto con sus atributos.
            foreach($proyectos as $p){
                ?>
                    <div class="container">
                        <!-- Cuando el usuario haga click en la etiqueta <a> pasaré mediante el método GET el proyecto al que se le ha hecho click para dirreccionar a proyecto.php-->
                        <a href="proyecto.php?proyecto=<?=$p['clave']?>">
                            <div class="card" style="width: 18rem;">
                                <!-- En el src de img utilizamos un operador ternario para ver si en el array existe una dirección de imagen o no, y en caso de que no introducimos una imagen por defecto-->
                                <img class="card-img-top" src="<?=(!empty($p['imagen'])?$p['imagen']:"static/images/default.jpg")?>" alt="<?=$p['clave']?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?=$p['titulo']?></h5>
                                    <p class="card-text"><?=$p['descripcion']?></p>
                                    <p class="card-text"><?=obtenerCategoria($categoria,$p)?></p>
                                    <p class="card-text"><?=date("d/m/Y",convertirFecha($p))?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
            }
        }else{
            $proyectos_filtrados = obtenerProyectos($_GET['categoria'], $proyectos);
            foreach($proyectos_filtrados as $p){
                ?>
                    <div class="container">
                        <!-- Cuando el usuario haga click en la etiqueta <a> pasaré mediante el método GET el proyecto al que se le ha hecho click para dirreccionar a proyecto.php-->
                        <a href="proyecto.php?proyecto=<?=$p['clave']?>">
                            <div class="card" style="width: 18rem;">
                                <!-- En el src de img utilizamos un operador ternario para ver si en el array existe una dirección de imagen o no, y en caso de que no introducimos una imagen por defecto-->
                                <img class="card-img-top" src="<?=(!empty($p['imagen'])?$p['imagen']:"static/images/default.jpg")?>" alt="<?=$p['clave']?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?=$p['titulo']?></h5>
                                    <p class="card-text"><?=$p['descripcion']?></p>
                                    <p class="card-text"><?=obtenerCategoria($categoria,$p)?></p>
                                    <p class="card-text"><?=date("d/m/Y",convertirFecha($p))?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
            }
        }
    ?>
</div>

<?php
    if(!isset($_GET['categoria'])){
        ?>
            <div class="formulario">
                <!-- Creamos un formulario que se envíe a sí mismo (es decir, que vuelva a la misma página) con $_SERVER['PHP_SELF'] y obtenemos los valores de los botones en caso de que el usuario los pulse-->
                <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
                    <button class="btn" type="submit" name="sort" value="sortDes">Ordenar Proyectos por Nombre Descendentemente</button>
                    <button class="btn" type="submit" name="sort" value="sortAsc">Ordenar Proyectos por Nombre Ascendentemente</button>
                    <button class="btn" type="submit" name="sort" value="1">Ordenar Proyectos por Fecha Descendentemente</button>
                    <button class="btn" type="submit" name="sort" value="-1">Ordenar Proyectos por Fecha Ascendentemente</button>
                </form>
            </div>
        <?php
    }
?>

<?php include ("templates/footer.php") ?>