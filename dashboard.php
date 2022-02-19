<?php 
    session_start();
  
    if(!$_SESSION['id']){
        header('location:login.php');
    }
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Marte Studio </title>
    <link rel="stylesheet" href="css/estilos.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&family=Yanone+Kaffeesatz:wght@300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/mistilo.css">
    <link rel="stylesheet" href="css/sti.css">

    <script src="js/welcome.js"></script>
</head>

<body>
    <div class="container-bienvenido" id="mywelcome">
        <h1 class="bienvenido">Bienvenido <?php echo ucfirst($_SESSION['nombre']); ?></h1>
    </div>

    <header class="header" id="inicio">
        <img src="img/desplegar.svg" alt="" class="desplegar">
        <nav class="menu-navegacion">
            <a href="#inicio">Inicio</a>
            <a href="#servicio">Servicio</a>
            <a href="#portafolio">Portafolio</a>
            <a href="#expertos">Expertos</a>
            <a href="#contacto">Contacto</a>
            <a href="logout.php?logout=true">Logout</a>
        </nav>
        <div class="contenedor head">
            <h1 class="titulo">Más allá de una publicidad </h1>
            <p class="copy">Marte studio es una empresa que está enfocada en ofrecer servicios de marketing
                digital, impresión litográfica, estampado en sublimación, avisos, vallas y montajes
                corporativos e impresión de alta calidad.</p>
        </div>
    </header>
    <main>
        <section class="services contenedor" id="servicio">
            <h2 class="subtitulo">Nuestros servicios </h2>
            <div class="contenedor-servicio">
                <img src="img/marte.jpg" alt="">
                <div class="checklist-servicio">
                    <div class="service">
                        <h3 class="n-service"><span class="number">1</span>Diseño Web</h3>
                        <p>El diseño web es una actividad que consiste en la planificación, diseño,
                            implementación y mantenimiento de sitios web.</p>
                    </div>
                    <div class="service">
                        <h3 class="n-service"><span class="number">2</span>Diseño Grafico</h3>
                        <p>El diseño gráfico es la profesión y disciplina académica cuya actividad
                            consiste en proyectar comunicaciones visuales destinadas a transmitir
                            mensajes específicos a grupos sociales con objetivos determinados.</p>
                    </div>
                    <div class="service">
                        <h3 class="n-service"><span class="number">3</span>Diseño Publicitario</h3>
                        <p>El diseño publicitario es una rama del diseño que combina lo visual con
                            el marketing, es decir, tiene como misión que los productos no solo se
                            vean bien, sino que sean atractivos para el consumidor y su imagen influya
                            en la decisión de compra.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="gallery" id="portafolio">
            <div class="contenedor">
                <h2 class="subtitulo">Galeria</h2>
                <div class="contenedor-galeria">
                    <img src="img/ima1.png" alt="" class="img-galeria">
                    <img src="img/ima2.png" alt="" class="img-galeria">
                    <img src="img/ima3.jpg" alt="" class="img-galeria">
                    <img src="img/ima4.jpg" alt="" class="img-galeria">
                    <img src="img/ima5.jpg" alt="" class="img-galeria">
                    <img src="img/ima6.jpg" alt="" class="img-galeria">
                </div>
            </div>
        </section>
        <section class="imagen-light">
            <img src="img/cerrar.svg" alt="" class="close">
            <img src="" alt="" class="agregar-imagen">
        </section>
        <section class="contenedor" id="expertos">
            <h2 class="subtitulo">Expertos en:</h2>
            <section class="experts">
                <div class="cont-expert">
                    <img src="img/analisis.svg" alt="">
                    <h3 class="n-expert">Diseños</h3>
                    <p class="parrafos">Contamos con un equipo de profesionales muy creativos
                        que te ayudaran a hacer realidad las ideas de diseño
                        que tienes para tu negocio o emprendimiento
                    </p>
                </div>
                <div class="cont-expert">
                    <img src="img/info.svg" alt="">
                    <h3 class="n-expert">Tendencias</h3>
                    <p class="parrafos">Estamos un pie a delante de las tendencias mas creativas
                        e innovadoras en la actualidad para brindar un servicio
                        de excelente calidad
                    </p>
                </div>
                <div class="cont-expert">
                    <img src="img/power.svg" alt="">
                    <h3 class="n-expert">Informacion global</h3>
                    <p class="parrafos">
                        Contamos con un manejo de redes de información masivas
                        para que no se nos escape nada respecto a las tecnicas
                        emergentes del diseño Grafico

                    </p>
                </div>
                <div class="contenedor">
                    <h3 class="subtitulo">¿Dudas o sugerencias?</h3>
                    <p class="copy"> Si deseas adquirir algún producto publicitario para tu emprendimiento
                        no dudes en comentarnos o contáctanos en nuestras redes sociales. </p>
                    <textarea name="mensaje" id="mensaje" cols="50" rows="8" require
                        placeholder="Comentario"></textarea>
                    <button type="submit" name="submit" class="btn_enviar">Enviar</button>
                </div>
            </section>
        </section>

    </main>
    <footer id="contacto">
        <div class="contenedor footer-content">
            <div class="contact-us">
                <h2 class="brand">Marte Studio</h2>
                <p>Somos expertos en diseñar tus sueños</p>
            </div>
            <div class="redes-sociales">
                <a href="https://www.facebook.com/Marte-studio-110250494771517/" class="redes-sociales-icon">
                    <i class='bx bxl-meta'></i>
                    <a href="https://www.instagram.com/martestudio9/?utm_medium=copy_link" class="redes-sociales-icon">
                        <i class='bx bxl-instagram'></i>
                        <a href="https://wa.me/573215276945" class="redes-sociales-icon">
                            <i class='bx bxl-whatsapp'></i>
                        </a>
            </div>
        </div>
        <div class="line"></div>
    </footer>

    <script src="js/menu.js"></script>
    <script src="js/lightbox.js"></script>
</body>

</html>