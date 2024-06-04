<?php
include 'conexion.php';

if(isset($_POST['enviar'])){

   $nombre = $_POST['nombre']; // Recuperar y filtrar los datos del formulario
   $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
   $correo = $_POST['correo'];
   $correo = filter_var($correo, FILTER_SANITIZE_STRING);
   $telefono = $_POST['telefono'];
   $telefono = filter_var($telefono, FILTER_SANITIZE_STRING);
   $mensaje = $_POST['mensaje'];
   $mensaje = filter_var($mensaje, FILTER_SANITIZE_STRING);

   // Verificar si el mensaje ya existe en la base de datos
   $verificar_mensaje = $conexion->prepare("SELECT * FROM `mensajes` WHERE nombre = ? AND correo = ? AND telefono = ? AND mensaje = ?"); 
   $verificar_mensaje->execute([$nombre, $correo, $telefono, $mensaje]); // Se utiliza para ejecutarla

   // Si el mensaje ya existe, mostrar una advertencia
   if($verificar_mensaje->rowCount() > 0){
      $mensajes_advertencia[] = '¡El mensaje ya ha sido enviado!';
   } else {
      // Si el mensaje no existe, insertarlo en la base de datos
      $insertar_mensaje = $conexion->prepare("INSERT INTO `mensajes`(nombre, correo, telefono, mensaje) VALUES(?,?,?,?)");
      $insertar_mensaje->execute([$nombre, $correo, $telefono, $mensaje]);
      $mensajes_exito[] = '¡Mensaje enviado con éxito!';
   }

}

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viajes Especiales</title>

    <link rel="icon" type="image/jpg" href="img/icono.jpg">


    <!--link de iconos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /><!--libreria swiper-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"  href="css/style.css"><!--hoja de estilos-->
</head>
<header>
    
    <!--SECTION HEADER STARTS-->
    <header class="header">

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

        <div class="header-content container">

            <div class="header-txt">
                <h1>Tu Próxima Aventura Comienza Aquí</h1>
                <p>Explora destinos exóticos, vive experiencias únicas y crea recuerdos inolvidables.
                    Con nuestros paquetes personalizados, podrás sumergirte en la cultura local, disfrutar de la gastronomía autóctona, y participar en actividades emocionantes que harán de tu viaje una experiencia inigualable. 
                    </p>
                    <a href="#" class="btn">Descubre más</a>
            </div>
        </div>


    <div class="images">
      
        <div class="swiper mySwiperHeader">

            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <img src="img/2.jpg" alt="">
                    <h3>Playa</h3>
                </div>
                <div class="swiper-slide">
                    <img src="img/3.jpg" alt="">
                    <h3>Hotel</h3>
                </div>
                <div class="swiper-slide">
                    <img src="img/4.jpg" alt="">
                    <h3>Naturaleza</h3>
                </div>
                <div class="swiper-slide">
                    <img src="img/5.jpg" alt="">
                    <h3>Canoas</h3>
                </div>
                <div class="swiper-slide">
                    <img src="img/6.jpg" alt="">
                    <h3>Lanchas</h3>
                </div>                  
            </div>           
        </div>          
    </div>

    <div class="rows">
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    
</header>

<!--SECTION HEADER ENDS-->


<!--SECTION SERVICES STARTS-->
<section class="services">

    <h1 class="heading-title">Nuestros servicios</h1>
   
    <div class="box-container">
      
       <div class="box">
         <img src="img/icon1.png" alt="">
         <h3>Aventuras al Aire Libre</h3>
       </div>
   
       <div class="box">
         <img src="img/icon2.png" alt="">
         <h3>Excursiones Diarias</h3>
       </div>
   
       <div class="box">
         <img src="img/icon3.png" alt="">
         <h3>Deportes Acuáticos</h3>
       </div>
   
       <div class="box">
         <img src="img/icon4.png" alt="">
         <h3>Gastronomía Local</h3>
       </div>
   
       <div class="box">
         <img src="img/icon5.png" alt="">
         <h3>Actividades Culturales</h3>
       </div>
   
       <div class="box">
         <img src="img/icon6.png" alt="">
        <h3>Rutas de Senderismo</h3>
       </div>
   
    </div>
   
   </section>
<!--SECTION SERVICES ENDS-->

<!--SECTION  HOME ABOUT  STARTS-->
<section class="home-about">
 
    <div class="content">
      <h3>Acerca de Nosotros</h3>
      <p>Ofrecemos una amplia gama de servicios personalizados, incluyendo la planificación completa de viajes, reservas de vuelos y alojamiento, y la organización de tours guiados y excursiones. Además, nuestros paquetes todo incluido aseguran que puedas relajarte y disfrutar sin preocupaciones.</p>
        <a href="acercade.php" class="btn">Leer más</a>
    </div>

    <div class="image">
        <img src="img/about.jpg" alt="">
      </div>
  
  </section>
  
<!--SECTION  HOME ABOUT  ENDS-->

<!--SECTION PAQUETES STARTS -->
<section class="packages">

    <h1 class="heading-title">Paquetes Especiales</h1>
   
    <div class="box-container">
   
       <div class="box">
          <div class="image">
            <img src="img/pk1.jpg" alt="">
          </div>
          <div class="content">
            <h3>Roma, Italia</h3>
            <p>Lorem ipsum dour adipisicing elit. Suscipit, officia! Ratione cupiditate ut similique tempora fugiat dicta ab molestiae accusantium harum illo.</p>
            <a href="reservar.php" class="btn">Reservar Ahora</a>
           </div>
       </div>
   
       <div class="box">
          <div class="image">
            <img src="img/pk2.jpg" alt="">
          </div>
          <div class="content">
            <h3>París, Francia</h3>
            <p>Explora la ciudad del amor y sus emblemáticos monumentos como la Torre Eiffel, el Louvre y Notre-Dame. Disfruta de la exquisita gastronomía francesa.</p>
            <a href="reservar.php" class="btn">Reservar ahora</a>
           </div>
       </div>
   
       <div class="box">
          <div class="image">
            <img src="img/pk3.jpg" alt="">
          </div>
          <div class="content">
            <h3>Kioto, Japón</h3>
            <p>Lorem ipsum dour adipisicing elit. Suscipit, officia! Ratione cupiditate ut similique tempora fugiat dicta ab molestiae accusantium harum illo.</p>
            <a href="reservar.php" class="btn">Reservar ahora</a>
           </div>
       </div>
   
    </div>
    
    <div class="load-more"><a href="paquetes.php" class="btn">Leer Más</a></div>
   
   </section>

<!--SECTION PAQUETES ENDS -->


<!--SECTION PREGUNTAS FRECUENTES STARTS -->
<section class="contact" id="contact">
   <div class="row">
      <form action="" method="post">
         <h3>Envíanos un mensaje</h3>
         <input type="text" name="nombre" required maxlength="50" placeholder="Ingresa tu nombre" class="box">
         <input type="email" name="correo" required maxlength="50" placeholder="Ingresa tu correo electrónico" class="box">
         <input type="number" name="telefono" required maxlength="10" min="0" max="9999999999" placeholder="Ingresa tu número de teléfono" class="box">
         <textarea name="mensaje" class="box" required maxlength="1000" placeholder="Ingresa tu mensaje" cols="30" rows="10"></textarea>
         <input type="submit" value="Enviar mensaje" name="enviar" class="btn">
      </form>

      <div class="faq">
         <h3 class="title">Preguntas Frecuentes</h3>
         <div class="box">
            <h3>¿Cuáles son los métodos de pago aceptados?</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus sunt aspernatur excepturi eos! Quibusdam, sapiente.</p>
         </div>
         <div class="box">
            <h3>¿Cuáles son los requisitos de edad para viajar?</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ipsam neque quaerat mollitia ratione? Soluta!</p>
         </div>
         <div class="box">
            <h3>¿Hay disponibilidad?</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ipsam neque quaerat mollitia ratione? Soluta!</p>
         </div>
         <div class="box">
            <h3>¿Puedo modificar mi reserva?</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ipsam neque quaerat mollitia ratione? Soluta!</p>
         </div>
         <div class="box">
            <h3>¿Qué incluye el paquete de viaje?</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ipsam neque quaerat mollitia ratione? Soluta!</p>
         </div>
      </div>
   </div>
</section>

<!--SECTION PREGUNTAS FRECUENTES ENDS -->



<!--SECTION OPINIONES STARTS-->
<section class="reviews">
    
    <div class="swiper reviews-slider">

      <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
         </div>
         <p>¡Increíble experiencia! El equipo de Tu Aventura hizo que nuestro viaje fuera inolvidable. Los destinos, la organización y el servicio fueron impecables. Definitivamente volveremos.</p> 
         <h3>María González</h3>
        <span>Viajero</span>  
        <img src="img/pic1.jpg" alt="">       
      </div>

      <div class="swiper-slide slide">
         <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
         </div>
         <p>¡Recomiendo Tu Aventura a todos mis amigos y familiares! Hicieron realidad mi sueño de explorar nuevos lugares y vivir aventuras emocionantes. ¡Gracias!</p>
           <h3>Ana López</h3>
           <span>Viajero</span>
           <img src="img/pic2.jpg" alt="">
      </div>

      <div class="swiper-slide slide">
        <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
        </div>
        <p>¡Increíble experiencia! El equipo de Tu Aventura hizo que nuestro viaje fuera inolvidable. Los destinos, la organización y el servicio fueron impecables. Definitivamente volveremos.</p>
          <h3>Juan García</h3>
          <span>Viajero</span>
          <img src="img/pic3.jpg" alt="">
     </div>

     <div class="swiper-slide slide">
        <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
        </div>
        <p>¡Recomiendo Tu Aventura a todos mis amigos y familiares! Hicieron realidad mi sueño de explorar nuevos lugares y vivir aventuras emocionantes. ¡Gracias!</p>
          <h3>Luz Rodríguez</h3>
          <span>Viajero</span>
          <img src="img/pic4.jpg" alt="">
     </div>
    

      <div class="swiper-slide slide">
         <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
         </div>
         <p>¡Increíble experiencia! El equipo de Tu Aventura hizo que nuestro viaje fuera inolvidable. Los destinos, la organización y el servicio fueron impecables. Definitivamente volveremos.</p>
         <h3> Carlos Martín</h3>
          <span>Viajero</span>
          <img src="img/pic5.jpg" alt="">
      </div>

      <div class="swiper-slide slide">
         <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
         </div>
         <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatibus numquam voluptatem possimus perspiciatis ea enim suscipit temporibus unde obcaecati, perferendis blanditii
          s soluta quam eligendi.</p>
          <h3>john deo</h3>
          <span>Viajero</span>
          <img src="img/pic6.jpg" alt="">
      </div>

      </div>

    </div>
</section>
<!--SECTION OPINIONES ENDS-->


<!--SECTION DESTINOS STARTS-->
<section class="packages2">

   <h1 class="heading-title">Descubre nuestros destinos</h1>
  
   <div class="box-container">

   <div class="box">
      <div class="image">
        <img src="img/pack1.jpg" alt="">
      </div>
      <div class="content">
         <h3>Exploración en el Amazonas</h3>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis, amet.</p>
         <a href="reserva.php" class="btn">Reservar ahora</a>
        </div>
     </div>

     <div class="box">
      <div class="image">
        <img src="img/pack2.jpg" alt="">
      </div>
      <div class="content">
         <h3>Maravillas de Machu Picchu</h3>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis, amet.</p>
         <a href="reserva.php" class="btn">Reservar ahora</a>
        </div>
     </div>

     <div class="box">
      <div class="image">
        <img src="img/pack3.jpg" alt="">
      </div>
      <div class="content">
         <h3>Aventura y diversión</h3>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis, amet.</p>
         <a href="reserva.php" class="btn">Reservar ahora</a>
        </div>
     </div>

     <div class="box">
      <div class="image">
        <img src="img/pack4.jpg" alt="">
      </div>
      <div class="content">
         <h3>Aventura y diversión</h3>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis, amet.</p>
         <a href="reserva.php" class="btn">Reservar ahora </a>
        </div>
     </div>

     <div class="box">
      <div class="image">
        <img src="img/pack5.jpg" alt="">
      </div>
      <div class="content">
         <h3>Aventura y diversión</h3>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis, amet.</p>
         <a href="reserva.php" class="btn">Reservar ahora</a>
        </div>
     </div>

     <div class="box">
      <div class="image">
        <img src="img/pack6.jpg" alt="">
      </div>
      <div class="content">
         <h3>Aventura y diversión</h3>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis, amet.</p>
         <a href="reserva.php" class="btn">Reservar ahora</a>
        </div>
     </div>

     <div class="box">
      <div class="image">
        <img src="img/pack7.jpg" alt="">
      </div>
      <div class="content">
         <h3>Aventura y diversión</h3>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis, amet.</p>
         <a href="reserva.php" class="btn">Reservar Ahora</a>
        </div>
     </div>

     <div class="box">
      <div class="image">
        <img src="img/pack8.jpg" alt="">
      </div>
      <div class="content">
         <h3>Aventura y diversión</h3>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis, amet.</p>
         <a href="reserva.php" class="btn">Reservar Ahora</a>
        </div>
     </div>

     <div class="box">
     <div class="image">
        <img src="img/pack9.jpg" alt="">
      </div>
      <div class="content">
         <h3>Aventura y diversión</h3>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis, amet.</p>
         <a href="reserva.php" class="btn">Reservar Ahora</a>
        </div>
     </div>

     <div class="box">
      <div class="image">
        <img src="img/pack10.jpg" alt="">
      </div>
      <div class="content">
         <h3>Aventura y diversión</h3>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis, amet.</p>
         <a href="reserva.php" class="btn">Reservar Ahora</a>
        </div>
     </div>

     <div class="box">
      <div class="image">
        <img src="img/pack1.jpg" alt="">
      </div>
      <div class="content">
         <h3>Aventura y diversión</h3>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis, amet.</p>
         <a href="reserva.php" class="btn">Reservar ahora </a>
        </div>
     </div>

     <div class="box">
      <div class="image">
        <img src="img/pack2.jpg" alt="">
      </div>
      <div class="content">
         <h3>Aventura y diversión</h3>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis, amet.</p>
         <a href="reserva.php" class="btn">Reservar ahora </a>
        </div>
     </div>
   

   </div>

   <div class="load-more"><span class="btn">Cargar Más</span></div>

</section>


<!--SECTION DESTINOS ENDS-->


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
 
    <div class="credit">
    &copy; <?= date('Y'); ?> por <span>Brenda, Diseñadora Web</span> | ¡Todos los derechos reservados!
    </div>

 </section>
<!--SECTION FOOTER ENDS-->


    <!--script-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
   
    
</body>
</html>