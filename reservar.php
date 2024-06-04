<?php
include 'conexion.php';

if(isset($_POST['enviar'])) {

    // Recoger los datos enviados desde el formulario y asignarlos a variables
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $ubicacion = $_POST['ubicacion'];
    $invitados = $_POST['invitados']; 
    $llegada = $_POST['llegada'];
    $salida = $_POST['salida'];

    // Consulta SQL para la base de datos
    $solicitud = "INSERT INTO reserva_form(nombre, correo, telefono, direccion, ubicacion, invitados, llegada, salida) VALUES ('$nombre', '$correo', '$telefono', '$direccion', '$ubicacion', '$invitados', '$llegada', '$salida')";

    // Ejecutar la consulta SQL y comprobar errores
    if(mysqli_query($conexion, $solicitud)) {
        header('location:reservar.php'); // Redirigir al usuario a otra página después de que se haya procesado el formulario 
        exit;
    } else {
        echo 'Error: ' . mysqli_error($conexion);
    }
} else {
    echo 'Algo salió mal, intenta de nuevo';
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca de Nosotros</title>
   
    <link rel="icon" type="image/jpg" href="img/icono.jpg">


    <!--link de iconos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /><!--libreria swiper-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"  href="css/style.css"><!--hoja de estilos-->

</head>
<body>
 
<!--SECTION HEADER STARTS-->
<header class="header-2">

<div class="menu container">

    <a href="index.php" class="logo">Viajar</a>
    <input type="checkbox" id="menu" />
    <label for="menu">
       <img src="img/menu.png"  class="menu-icono" alt="">
    </label>

    <nav class="navbar">
        <ul>
            <li><a href="index.php" >Inicio</a></li>
            <li><a href="acercade.php">Acerca de Nosotros</a></li>
            <li><a href="paquetes.php">Paquetes</a></li>
            <li><a href="reservar.php">Reservar</a></li>
        </ul>
    </nav>
    <div class="icons">
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-instagram"></i>
    </div>
</div>

</header>
<!--SECTION HEADER ENDS-->

<!--SECTION RESERVA STARTS-->
<section class="reserva">

   <h1 class="heading-title">¡Reserva tu viaje!</h1>

   <form action="" method="post" class="reserva-form">

     <div class="flex">
       <div class="inputBox">
         <span>nombre :</span>
         <input type="text" placeholder="ingresa tu nombre" name="nombre">
       </div>
       <div class="inputBox">
         <span>correo :</span>
         <input type="email" placeholder="ingresa tu correo" name="correo">
       </div>
       <div class="inputBox">
         <span>teléfono :</span>
         <input type="number" placeholder="ingresa tu número" name="telefono">
       </div>
       <div class="inputBox">
         <span>dirección :</span>
         <input type="text" placeholder="ingresa tu dirección" name="direccion">
       </div>
       <div class="inputBox">
         <span>destino:</span>
         <input type="text" placeholder="lugar que quieres visitar" name="ubicacion">
       </div>
       <div class="inputBox">
         <span>¿cuántos?:</span>
         <input type="number" placeholder="número de invitados" name="invitados">
       </div>
       <div class="inputBox">
         <span>llegada:</span>
         <input type="date" name="llegada">
       </div>
       <div class="inputBox">
         <span>salida:</span>
         <input type="date" name="salida">
       </div>
     </div>

     <input type="submit" value="enviar" class="btn" name="enviar">

   </form>

</section>
<!--SECTION RESERVA ENDS-->


<!--SECTION FOOTER STARTS-->
<section class="footer">

    <div class="box-container">
 
      <div class="box">
         <h3>enlaces rápidos</h3>
         <a href="index.php"><i class="fas fa-angle-right"></i>Inicio</a>
         <a href="acercade.php"><i class="fas fa-angle-right"></i>Acerca de Nosotros</a>
         <a href="package.php"><i class="fas fa-angle-right"></i>Paquetes</a>
         <a href="reservar.php"><i class="fas fa-angle-right"></i>Reservar</a>
      </div>
 
      <div class="box">
         <h3>enlaces adicionales</h3>
         <a href="#"><i class="fas fa-angle-right"></i>preguntar</a>
         <a href="#"><i class="fas fa-angle-right"></i>acerca de nosotros</a>
         <a href="#"><i class="fas fa-angle-right"></i>política de privacidad</a>
         <a href="#"><i class="fas fa-angle-right"></i>términos de uso</a>
      </div>
 
      <div class="box">
         <h3>información de contacto</h3>
         <a href="#"><i class="fas fa-phone"></i> +123-456-7890</a>
         <a href="#"><i class="fas fa-phone"></i> +111-222-3333</a>
         <a href="#"><i class="fas fa-envelope"></i> viajes@gmail.com</a>
         <a href="#"><i class="fas fa-map"></i>Ciudad de México, México - 01000  </a>    
      </div>
 
      <div class="box">
         <h3>síguenos</h3>
         <a href="#"><i class="fab fa-facebook-f"></i> facebook</a>
         <a href="#"><i class="fab fa-twitter"></i> twitter</a>
         <a href="#"><i class="fab fa-instagram"></i> instagram</a>
         <a href="#"><i class="fab fa-linkedin"></i> linkedin</a>
      </div>
 
    </div>
 
    <div class="credit">Desarrollado por <span>Diseñador web</span> ¡Todos los derechos reservados!</div>
 </section>
<!--SECTION FOOTER ENDS-->


</body>
</html>