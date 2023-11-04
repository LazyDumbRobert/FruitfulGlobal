<?php
    namespace Model;

    class ActiveRecord {
        
    //Base de Datos
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';
    //Errores
    protected static $errores = [];
  
   
    //Definir la conexion a la base de datos
    public static function setDB($database) {
        self::$db = $database;
        
    }

    public function Guardar(){
        if(!is_null($this->id)){
            $this->actualizar();
        }else{
            $this->Crear();
        }    
    }

    public function Crear(){
        
        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();
        
        //INSERTAR EN LA BASE DE DATOS 
        $query = "INSERT INTO " . static::$tabla ." (";
        $query .= join(',',array_keys($atributos));
        $query .= " ) VALUES (' "; 
        $query .= join("','",array_values($atributos));
        $query .= " ')";

        $resultado = self::$db->query($query);
        if($resultado){
            //Redireccionar al usuario
            header('Location: /admin?resultado=1');
        }
    }

    public function actualizar(){
        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach($atributos as $key => $value){
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ',$valores);
        $query .= "WHERE id = '" . self::$db->escape_string($this->id). "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);
        
        if($resultado){
            //almacenar la imagen

            header('Location: /admin?resultado=2');
        }
    }
    //Eliminar un registro
    public function eliminar(){
        $query = "DELETE FROM ". static::$tabla ." where id= ".self::$db->escape_string($this->id). " LIMIT 1";

        $resultado = self::$db->query($query);

        if($resultado){
            //almacenar la imagen
            $this->borrarImagen();

            header('Location: /admin?resultado=3');
        }
    }
  
    
    public function Atributos(){
        $atributos = [];
        foreach(static::$columnasDB as $columna):
            if($columna == 'id') continue;
            $atributos[$columna] = $this->$columna;
        endforeach;
        
        return $atributos;
    }

    public function sanitizarAtributos(){
        $atributos = $this->Atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value):
            $sanitizado[$key] = self::$db->escape_string($value);
        endforeach;
        return $sanitizado;
    }

    //Subida de archivos

    public function setImagen($imagen){
        //Elimina la imagen previa
        if(!is_null($this->id)){
           $this->borrarImagen();
        }
        //Asignar al atributo de imagen el nombre de la imagen
        if($imagen){
            $this->imagen = $imagen;
        }
    }

    //Eliminar archivo

    public function borrarImagen(){
        $existeArchivo = file_exists(CARPETA_IMAGENES ."/". $this->imagen);

        if($existeArchivo){
            unlink(CARPETA_IMAGENES ."/". $this->imagen);
        }
    }

    //Validación
    public static function getErorres(){
        return static::$errores;
    }
    
    
    public function validar(){
        static::$errores = [];
        return static::$errores;
    }

    /*Lista las propiedades*/

    public static function all(){
        $query = "SELECT * FROM ". static::$tabla;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    //Busca un registro por su ID

    public static function find($id){
        $query = "SELECT * from " . static::$tabla ." WHERE id=$id";
        $resultado = self::consultarSQL($query);

        return(array_shift($resultado));
    }

    public static function consultarSQL($query){
        //consultar la base de datos
        $resultado = self::$db->query($query);

        //Iterar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = static::crearObjeto($registro);
        }

        //Liberar la memoria
        $resultado->free();
        //Retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto = new static;

        foreach($registro as $key => $value){
            if(property_exists($objeto, $key)){
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    //Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($args = []){
        foreach($args as $key => $value){
            if(property_exists($this,$key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }

     //Obtiene determinado numero de registros

     public static function get($cantidad){
        $query = "SELECT * FROM ". static::$tabla . " LIMIT " . $cantidad;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }


    }

   
?>