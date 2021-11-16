
<?php
include('db.php');
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;
$conexion=mysqli_connect("localhost","root","","TransmisionDatos");
$consulta="SELECT*FROM usuarios where cuenta='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);
if($filas){
  header("Location: ../index.html");
  die();
}else{
    ?>
    <?php
    include("../login.html");
  ?>
  <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <link rel="stylesheet" href="../css/login.css" />
      <link rel="stylesheet" href="../css/estilos.css" />
      <link rel="shortcut icon" type="image/x-icon" href="../images/Icono.png" />
   </head>
</html>