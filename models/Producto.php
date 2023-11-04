<?php 

namespace Model;

class Producto extends ActiveRecord {
    protected static $tabla = 'productos';
    protected static $columnasDB = ['id','producto','imagen','descripcion','creado'];

    public $id;
    public $producto;
    public $imagen;
    public $descripcion;
    public $creado;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->producto = $args['producto'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->creado = date('Y/m/d');
        
    }

    
    public function validar(){
        if(!$this->producto){
            self::$errores[] = "Debes añadir un titulo";
        }

        if(strlen($this->descripcion) < 50){
            self::$errores[] = "La descripcion es obligatoria y debe tener al menos 50 caracteres";
        }

        if(!$this->imagen){
            self::$errores[] = "La imagen es de la propiedad es obligatoria";
        }

        return self::$errores;
    }
    
}