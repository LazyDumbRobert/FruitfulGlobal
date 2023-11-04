<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES',$_SERVER['DOCUMENT_ROOT'] . "\imagenes\\");

function incluirTemplate(string $nombre, bool $inicio = false){
    include TEMPLATES_URL . "/{$nombre}.php";
}

function estaAutenticado(): bool{
    session_start();
    if(!$_SESSION['login']){
        header('Location: /');
    }
    return false;
}

function debuguear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

//Escapar / Sanitizar el HTML

function s($html) : string{
    $s = htmlspecialchars($html);
    return $s;
}

// Validar tipo de contenido

function validarTipoContenido($tipo){
    $tipos = ['vendedor','propiedad'];

    return in_array($tipo,$tipos);
}

//Muestra los mensajes 

function MostrarNotificacion($codigo){
    $mensaje = '';

    switch ($codigo) {
        case 1:
            $mensaje = 'Creado correctamente';
            break;
        
        case 2:
            $mensaje = 'Actualizado correctamente';
            break;

        case 3:
            $mensaje = 'Eliminado correctamente';
            break;
        
        default:
            $mensaje = FALSE;
            break;
    }

    return $mensaje;
}

function validarORedireccionar(string $url){
    //Id para valdar el ID
    $id = $_GET['id'];
    $id = filter_var($id,FILTER_VALIDATE_INT);

    if(!$id){
        header("LOCATION: $url");
    }

    return $id;
    
}