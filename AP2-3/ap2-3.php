<?php
//Ejercicio SINGLETON

//He visto en los apuntos que esto sirve para que haga una única función, por ejemplo conectarse a una bbdd (solamente una vez)

class Singleton{

    private static $instance = null;
    private static $host = "servidor_db";
    private static $username = "root";
    private static $password = "root";
    private static $database = "AP1";


    private function __construct(){} //Evitamos la instancia directa cuando se suele crear desde fuera un nuevo objeto;

    public static function getInstanceDb(){

        if(self::$instance == null){

            try{

                self::$instance = new mysqli(self::$host, self::$username, self::$password, self::$database);


                if(self::$instance->connect_errno){

                    throw new Exception("Fallo en la conexión a la BBDD " . self::$database . " - " . self::$instance->connect_error);

                }

                print "<strong>Conexión realizada correctamente a la base de datos " . self::$database . "</strong>";


            }catch(Exception $e){

                echo $e->getMessage();
                die();

            }


        }

        return self::$instance; //Pongo el return al final para que no pare el código

    }

}

$connect = Singleton::getInstanceDb();