<?php

namespace Controllers;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Producto;

class ProductoController {
    public static function index(Router $router){
        $productos = Producto::all();

        $resultado = $_GET['resultado'] ?? null;
        $router->render('propiedades/admin',[
            'productos' => $productos,
            'resultado' => $resultado,
        ]);
        
    }

    public static function crear(Router $router){
        $producto = new Producto();

        $errores = Producto::getErorres();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //Crea una nueva instancia
            $producto = new Producto($_POST['producto']);
            /** SUBIDA DE ARHIVOS**/
            //Crear carpeta
            $carpetaImagenes = '../../imagenes/';
            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }   
            
            //Generar un nombre unico 
            $nombreImagen = md5(uniqid(rand(),true)).".jpg";
    
            //Setear la imagen
            
            //Realiza un resize a la imagen con intervetion
            if($_FILES['producto']['tmp_name']['imagen']){
                $image = Image::make($_FILES['producto']['tmp_name']['imagen'])->fit(800,600);
                $producto->setImagen($nombreImagen);
            }
        
            // debuguear($propiedad);
            $errores = $producto->validar();
            
            //Revisar que el arreglo de errores este vacio 
            if(empty($errores)){
                
                //Crear la carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }
                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                
                //GUARDA EN LA BASE DE DATOS
                $producto->Guardar();
               
            }
           
        }

        $router->render('propiedades/crear',[
            'producto' => $producto,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router){
        $id = validarORedireccionar('/admin');
        $producto = Producto::find($id);
        $errores = Producto::getErorres();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
            //Asignar los atributos
            
            $args = $_POST['propiedad'];
    
            $producto->sincronizar($args);
    
            $errores = $producto->validar();
    
            $nombreImagen = md5(uniqid(rand(),true)).".jpg";
    
            //Subida de archivos
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $producto->setImagen($nombreImagen);
            }
    
            if(empty($errores)){
                //Almacenar imagen 
                if($_FILES['propiedad']['tmp_name']['imagen']){
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $producto->Guardar();
            }
           
        }

        $router->render('/propiedades/actualizar', [
            'producto' => $producto
        ]);
    }
    
    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $id = $_POST['id'];
            $id = filter_var($id,FILTER_VALIDATE_INT);
    
            if($id){
    
                $tipo = $_POST['tipo'];
                // debuguear($tipo);

                if(validarTipoContenido($tipo)){
                    $producto = Producto::find($id);
                    debuguear($producto);
                    $producto->eliminar();
                }
            }
        }
    }
}