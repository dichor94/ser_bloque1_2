<?php

class vehiculoCarrera{

    protected $nombreUser;
    protected $marca;
    protected $modelo;
    protected $color;
    public $velocidadMax;
    protected $velocidadActual;

    public function __construct($nombreUser ,$marca, $modelo, $color){

        $this->nombreUser = $nombreUser;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->color = $color;
        $this->velocidadMax = rand(250, 300);
        $this->velocidadActual = 0;
        $this->distanciaRecorrida = 0;

    }

    public function acelerar($dado){

        $incremento = $dado * 10; //Se multiplica la puntuación del dado por 10 ya que se avanza de 10 en 10
        $this->velocidadActual += $incremento;

        if($this->velocidadActual > $this->velocidadMax){

            $this->velocidadActual = $this->velocidadMax;

        }

        echo "El usuario $this->nombreUser con coche $this->marca modelo $this->modelo tiene una velocidad actual de $this->velocidadActual, tiene un incremento de $incremento<br><br>";

    }

    public function avanzar(){

        $this->distanciaRecorrida += $this->velocidadActual / 60;

        echo "$this->nombre ha recorrido un total de $this->distanciaRecorrida.<br><br>";


    }

}

function tirarDado($min, $max){

    return rand($min, $max);

}

function creacionUsuario($numJugadores){

    $jugadores = [];

    for($i = 0; $i < $numJugadores; $i++){

        echo "Jugador núm $i ingresa tu nombre: ";
        $nombre = trim(fgets(STDIN));
        echo "Jugador núm $i ingresa la marca del coche: ";
        $marca = trim(fgets(STDIN));
        echo "Jugador núm $i ingresa el modelo del coche: ";
        $modelo = trim(fgets(STDIN));
        echo"Jugador núm $i ingresa el color del coche: ";
        $color = trim(fgets(STDIN));
        
        if(isset($nombre) and isset($marca) and isset($modelo) and isset($color)){

            $jugadores[] = new vehiculoCarrera($nombre, $marca, $modelo, $color);

            echo "El coche del jugador $i tiene una velocidad máxima de: " . $jugadores[$i]->velocidadMax;

        }

    }

    return $jugadores;
}


function jugarCarrera($numJugadores){

    $ganador = false;

    while(!$ganador){

        foreach($numJugadores as $numJugador){

            echo "Es el turno de " . $numJugador->nombre . " presiona enter para tirar el dado.";
            fgets(STDIN);

            $dado = tirarDado(1,10);
            echo "En esta tirada has sacaso un $dado";
            $numJugador->acelerar($dado);

            $numJugador->avanzar();

            if($numJugador->distanciaRecorrida >=100){

                $ganador = true;
                break;
            }

        }

        echo "\n\n";

    }


}



do {

    echo "Ingresa el número de jugadores(entre 2 y 6): ";
    $jugadorTotal = trim(fgets(STDIN));

    if($jugadorTotal >= 2 or $jugadorTotal <= 6){

        echo "Hay en total $jugadorTotal jugadores<br>";

    }

}while($jugadorTotal < 2 || $jugadorTotal > 6);

$jugadores = creacionUsuario($jugadorTotal);