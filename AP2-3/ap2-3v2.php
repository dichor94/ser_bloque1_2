<?php
class InstanceDB{

    private static $instance = null;

    private $connection;
    private $host = "servidor_db";
    private $user = "root";
    private $password = "root";
    private $database = "AP1";

    private function __construct(){



        try{

            $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database);


            if($this->connection->connect_errno){

                throw new Exception("Fallo en la conexión a la BBDD " . $this->database . " - " . $this->connection->connect_error);

            }

            print "<strong>Conexión realizada correctamente a la base de datos " . $this->database . "<br></strong>";


        }catch(Exception $e){

            echo $e->getMessage();
            die();

        }

    }

    public static function getInstance(){

        if(self::$instance == null){

            self::$instance = new InstanceDB(); //Se llama a sí misma

        }

    }

    public function getConnection(){

        return $this->connection; //Hacemos esta función para ver si es la misma instacia

    }


}