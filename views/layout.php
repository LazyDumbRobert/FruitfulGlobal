<?php
    if(!isset($_SESSION)){
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FruitfulGlobal</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
    
    <header class="header <?php echo $inicio ? 'inicio' : '';?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <h1>Fruitful<span>Global</span></h1>
                </a>   
                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg">
                    <nav class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/productos">Productos</a>
                        <a href="blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if($auth):?>
                            <a href="/logout">Cerrar sesión</a>
                        <?php endif;?>
                        <?php if(!$auth):?>
                            <a href="/login">Iniciar sesión</a>
                        <?php endif;?>
                    </nav>
                </div>
               
            </div> <!--.barra-->

            <?php 
                 echo $inicio ? "<h1>Exportación e Importación de Alimentos</h1>" : '';
            ?>
            
        </div>
</header>

<?php echo $contenido;?>

    
<footer class="footer seccion">
        <div class="contenedor">
            <div class="contenedor contenedor-footer">
                <nav class="navegacion">
                    <a href="/nosotros">Nosotros</a>
                    <a href="/productos">Productos</a>
                    <a href="/blog">Blog</a>
                    <a href="/contacto">Contacto</a>
                </nav>
            </div>
        </div>

        <p class="copyright">Todos los derechos reservados <?php echo date('Y');?> &copy;</p>
    </footer>
    <script src="../build/js/bundle.min.js"></script>
</body>
</html>