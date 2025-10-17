<?php session_start(); ?>
<?php include_once ("datos.php")?>
<?php include_once ("utiles.php")?>
<?php
  if(isset($_POST['email'],$_POST['pass'])){
    if(verificarUser($_POST['email'], $_POST['pass'], $usuarios)){
      $_SESSION['user_email']=$_POST['email'];
      header("Location: contacto_lista.php");
      exit();
    }else if(!verificarCampo("email",$_POST['email'], $usuarios)){
      $_SESSION['errores']['email']="Email incorrecto";
    }else if(!verificarCampo("password",$_POST['pass'],$usuarios)){
      $_SESSION['errores']['pass']="Contraseña incorrecta";
    }
  }

  $email = $_POST['email'];
  $pass = $_POST['pass'];
?>

<?php include ("templates/header.php") ?>

<form action="" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email </label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" value="<?=(!isset($_SESSION['errores']['email']))?$email:""?>">
    <?php
      if(!empty($_SESSION['errores']['email'])){
        ?>
          <div class="alert alert-danger" role="alert"><?=$_SESSION['errores']['email']?></div>
        <?php
        unset($_SESSION['errores']['email']);
      }
    ?>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
    <input type="password" class="form-control" name="pass" value="<?=(!isset($_SESSION['errores']['pass']))?$pass:""?>">
    <?php
      if(!empty($_SESSION['errores']['pass'])){
        ?>
          <div class="alert alert-danger" role="alert"><?=$_SESSION['errores']['pass']?></div>
        <?php
        unset($_SESSION['errores']['pass']);
      }
    ?>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php include ("templates/footer.php") ?>