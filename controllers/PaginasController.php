<?php

namespace Controllers;
use MVC\Router;
use Model\Producto;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{

    public static function index(Router $router){
        $productos = Producto::get(3);
        $inicio = true;
        $router->render('paginas/index', [
            'productos' => $productos,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router){
        $router->render('paginas/nosotros', [

        ]);
    }

    public static function productos(Router $router){
        $productos = Producto::all();
        $router->render('paginas/productos',[
            'productos' => $productos

        ]);
    }

    public static function producto(Router $router){
        $id = validarORedireccionar('/propiedades');

        //Buscar propiedad por su id
        $producto = Producto::find($id);
        $router->render('paginas/producto',[
            'producto' => $producto
        ]);
    }

     public static function blog(Router $router){
        $router->render('paginas/blog',[

        ]);
    }

     public static function entrada(Router $router){
        $router->render('paginas/entrada',[

        ]);
    }

    public static function contacto(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $mensaje = null;
            $respuestas = $_POST['contacto'];
   
            //Crear un instancia de PHPMailer
            $mail = new PHPMailer();

            //Configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '3f4408f5075c30';
            $mail->Password = '865687b3705b10';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            //Configurar el contenido del email
            $mail->setFrom('admin@biensraices.com');
            $mail->addAddress('admin@bienesracies.com','BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            //Habilitar HTML
            $mail ->isHTML(true);
            $mail->CharSet = 'UTF-8';


            //Definir el contenido
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: '. $respuestas['nombre'].'</p>';

            //Enviar de forma condicional de email o telefono
            if($respuestas['contacto'] === 'telefono'){
                $contenido .= '<p>Eligió ser contactado por telefono</p>';
                $contenido .= '<p>Telefono: '. $respuestas['telefono'].'</p>';
                $contenido .= '<p>Fecha de contacto: '. $respuestas['fecha'].'</p>';  
                $contenido .= '<p>Hora: '. $respuestas['hora'].'</p>';  
                
            }else{
                //Es email, entonces agregamos el email
                $contenido .= '<p>Eligió ser contactado por Email</p>';
                $contenido .= '<p>Email: '. $respuestas['email'].'</p>';
            }

            $contenido .= '<p>Mensaje: '. $respuestas['mensaje'].'</p>';  
            $contenido .= '<p>Vende o compra: '. $respuestas['tipo'].'</p>';  
            $contenido .= '<p>Precio o presupuesto: $'. $respuestas['precio'].'</p>';  
            $contenido .= '<p>Contacto de preferencia: '. $respuestas['contacto'].'</p>';  
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto aternativo sin HTML';
            //Enviar email
            if($mail->send()){
                $mensaje = "Mensaje enviado correctamente.";
            }else{
                $mensaje = "El mensaje no se pudo enviar...";
            }
        }
        $router->render('paginas/contacto',[
            'mensaje' => $mensaje
        ]);
    }

    

}