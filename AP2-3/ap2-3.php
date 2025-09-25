<?php
//Ejercicio SINGLETON

//He visto en los apuntos que esto sirve para que haga una única función, por ejemplo conectarse a una bbdd (solamente una vez)

class Singleton{

    private static $instance = null;

    private $connection ;
    private  $host = "servidor_db";
    private  $username = "root";
    private  $password = "root";
    private  $database = "AP1";


    private function __construct(){

        try{

            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
            if(self::$instance->connect_errno){

                throw new Exception("Fallo en la conexión a la BBDD " . $this->database . " - " . self::$instance->connect_error);

            }

            print "<strong>Conexión realizada correctamente a la base de datos " . $this->database . "<br></strong>";


        }catch(Exception $e){

            echo $e->getMessage();
            die();

        }


    }

    //Hago una función para hacer una nueva instancia
    public static function getInstance(){

        if(self::$instance == null){

            self::$instance = new Singleton();

        }

        return self::getInstance();

    }


}

//Ejemplo básico de función, se podría poner un control de errores
function selectQuery($select){

    $select = $select->query("SELECT * FROM usuarios");

    if($select){

        $select = $select->fetch_all(MYSQLI_ASSOC);

        if(count($select) > 0){

            foreach($select as $usuario){

                print $usuario['id'] . " - " . $usuario['nombre'] . " " .$usuario['estado'] . "<br>";

            }


        }else{

            print "No se encontraron resultados en la base de datos";


        }

    }
}




$connect1 = Singleton::getInstanceDb();
$connect2 = Singleton::getInstanceDb();

var_dump($connect1 === $connect2);


