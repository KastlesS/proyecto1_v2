<?php require_once ("datos.php")?>
<?php require_once ("utiles.php")?>
<?php include ("templates/header.php") ?>

<?php
  $error="";
  if(isset($_POST['email'],$_POST['pass'])){
    if(verificarUser($_POST['email'], $_POST['pass'], $usuarios)){
      header("Location: contacto_lista.php");
      exit();
    }else{
      $error="Error";
    }
  }

?>


<form action="" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email </label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
    <input type="password" class="form-control" name="pass">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  <p><?=$error?></p>
</form>

<?php include ("templates/footer.php") ?>