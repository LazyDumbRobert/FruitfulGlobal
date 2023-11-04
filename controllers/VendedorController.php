<?php
namespace Controllers;
use MVC\Router;
use Model\Vendedor;


class VendedorController{

    public static function crear(Router $router){

        $errores = Vendedor::getErorres();
        $vendedor = new Vendedor;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //Crear una nueva instancia
            $vendedor = new Vendedor($_POST['vendedor']);
    
            //Validar que no haya campos vacios
            $errores = $vendedor->validar();
    
            if(empty($errores)){
                $vendedor->Guardar();
            }
               
        }

        $router->render('vendedores/crear',[
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }

    public static function actualizar(Router $router){
        $id = validarORedireccionar('/admin');
        $errores = Vendedor::getErorres();
        //Obtener datos del vendedor a actualizar
        $vendedor = Vendedor::find($id);



        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //Asignar los valores
    
            $args = $_POST['vendedor'];
    
            //Sincronizar el objeto en memoria con lo que el usuario escribió
            $vendedor->sincronizar($args);
    
            //Validación
            $errores = $vendedor->validar();
    
            if(empty($errores)){
                $vendedor->Guardar();
            }       
        }

        $router->render('vendedor/actualizar',[
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //Valida el tipo a validar
            $tipo = $_POST['tipo'];

            //Validar id

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id){
                $tipo = $_POST['tipo'];

                if(validarTipoContenido($tipo)){
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }
            }
            
        }
    }
}
