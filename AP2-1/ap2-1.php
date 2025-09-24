<?php

class vehiculoCarrera{

    protected $marca;
    protected $modelo;
    protected $velocidad;
    protected $combustible;

    protected $velocidadActual = 0;

    public function __construct($marca, $modelo, $velocidad, $combustible){

        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->velocidad = $velocidad;
        $this->combustible = $combustible;

    }

    //Restaremos 5 cuando llamemos a este método
    protected function consumirCombustible(){

        if($this->combustible > 0){

            $this->combustible -= 5;

        }else{

            echo "Ya no hay combustible en el coche $this->marca modelo $this->modelo";

        }

    }


    public function arrancar(){

        if($this->combustible > 0){


            echo "El coche $this->marca modelo $this->modelo ha arrancado correctamente, en estos momentos tiene $this->combustible  de combustible/batería <br>";


        }else{

            echo "El coche no tiene combustible y no puede arrancar!<br>";

        }
    }

    public function acelerar(){



        if($this->combustible > 0 and $this->velocidadActual <= $this->velocidad){

            $this->velocidadActual += 10;
            $this->consumirCombustible();
            echo "El coche está acelerando!, velocidad actual $this->velocidadActual<br>";

        }else{

            echo "El coche no tiene combustible, se detiene el coche!<br>";
            $this->detener();

        }

    }

    public function detener(){

        if($this->combustible < 0){

            echo "Coche detenido!<br><br>";
            $this->combustible = 0; //Añado 0 al atributo para que se active el destructor
        }else{

            
            echo "El coche tiene combustible/batería para poder arrancar después!<br>";
            echo "Coche detenido!<br><br>";

        }

    }

    public function mostrarEstado(){

        echo "-------ESTADO ACTUAL DEL COCHE-------- $this->modelo    <br><br>";
        echo "Marca actual: $this->marca<br>";
        echo "Modelo actual: $this->modelo<br>";
        echo "Velocidad Máxima: $this->velocidad<br>";
        echo "Velocidad actual: $this->velocidadActual<br>";
        echo "Combustible actual: $this->combustible<br>";


    }

    public function __destruct(){

        if($this->combustible == 0){

            echo "Coche se ha retirado de la carrera!<br>";

        }


    }


}

class cocheF1 extends vehiculoCarrera{

    protected $alerones; //Puedo poner que si es true, haga la función que tenga que hacer

    public function __construct($marca, $modelo, $velocidad, $combustible, $alerones){

        parent::__construct($marca, $modelo, $velocidad, $combustible);
        $this->alerones = $alerones; //Para activar el DRS debe de tener alerones el coche


    }

    public function activarDrs(){

        if($this->alerones === true and $this->combustible > 0 and $this->velocidad > 0){

            $this->velocidad += 20;
            $this->combustible -= 15;
            echo "Se ha activado el DRS!, VELOCIDAD ACTUAL $this->velocidad km/h<br>";


        }else if($this->alerones === true and $this->velocidad <=0){

            echo "El coche tiene DRS pero no se puede usar, vehículo parado!<br>";

        }


    }

}


class cocheElectricoF1 extends vehiculoCarrera{

    protected $bateria;

    public function __construct($marca, $modelo, $velocidad,$combustible ,$bateria){
        parent::__construct($marca, $modelo, $velocidad, $combustible);
        $this->bateria = $bateria;
    }

    public function recargar(){

        if($this->combustible >= 0 and ($this->combustible < 15)){

            echo "Tienes que recargar la batería!<br>";

        }else if($this->bateria == 0){

            $this->combustible = 0;
            echo "Coche sin batería<br><br>";
        }

    }



}

$coche1 = new cochef1("Ranult", "f1_pro", 180, 80, true);
$coche1->mostrarEstado();
echo "<br><br>";
$coche1->arrancar();
$coche1->acelerar();
$coche1->acelerar();
$coche1->mostrarEstado();
echo "<br><br>";
$coche1->acelerar();
$coche1->acelerar();
$coche1->detener();

$coche1->mostrarEstado();
echo "<br><br>";

$coche1->arrancar();
$coche1->acelerar();
$coche1->acelerar();




//COCHE 2
/*
$coche2 = new cocheElectricoF1("Renaul", "E-FRANCE", 180, 100, true);
$coche2->arrancar();
$coche2->mostrarEstado();
$coche2->acelerar();
$coche2->acelerar();
$coche2->acelerar();
$coche2->mostrarEstado();
$coche2->acelerar();
$coche2->acelerar();
$coche2->acelerar();
$coche2->acelerar();
$coche2->acelerar();
$coche2->acelerar();
$coche2->mostrarEstado();*/


