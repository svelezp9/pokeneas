<?php

namespace App\Http\Controllers;
class PokeneasController extends Controller
{
    public static $pokeneas = [

        ["id"=>"1", "name"=>"Brayan", "altura"=>"1.8", "habilidad" => "Robo instantaneo", "imagen" => "https://storage.googleapis.com/pokeneas/Pokeneas/brayan.jpg", "frase" => "Me dice la hora porfa?"],
        
        ["id"=>"2", "name"=>"Kevin la maquina", "altura"=>"1.6", "habilidad" => "Atraccion de mujeres", "imagen" => "https://storage.googleapis.com/pokeneas/Pokeneas/kevin.jpg", "frase" => "Mami venga pa aca le muestro el cielo"],
        
        ["id"=>"3", "name"=>"Julian el chuzo", "altura"=>"1.78", "habilidad" => "Navajazo sonico", "imagen" => "https://storage.googleapis.com/pokeneas/Pokeneas/julian.jpg", "frase" => "Profe haga esos tutoriales mejor o si no..."],
        
        ["id"=>"4", "name"=>"Pablo el abuelo", "altura"=>"1.77", "habilidad" => "tiro y pal rio", "imagen" => "https://storage.googleapis.com/pokeneas/Pokeneas/pablo.jpg", "frase" => "Si te vas a conseguir una mujer, que no sea como la pi*oba de Amber Heard"],

        ["id"=>"5", "name"=>"Yulani la mostra", "altura"=>"2", "habilidad" => "Lenguaje del barrio bajo", "imagen" => "https://storage.googleapis.com/pokeneas/Pokeneas/yulani.png", "frase" => "La buena socio se me cuida, me tramo bastante uste, una bala mi pai"],
        
        ["id"=>"6", "name"=>"Felipe la punalada", "altura"=>"1.5", "habilidad" => "Navajazo silencioso", "imagen" => "https://storage.googleapis.com/pokeneas/Pokeneas/felipe.jpg", "frase" => "Silencioso como sombra y rapido como morza"],
        
        ["id"=>"7", "name"=>"David el buscador", "altura"=>"1.68", "habilidad" => "Buscar en Google", "imagen" => "https://storage.googleapis.com/pokeneas/Pokeneas/david.jpg", "frase" => "Ni idea como funciona esa cosa, googleelo y sale"],
        
        ["id"=>"8", "name"=>"Juan la rata", "altura"=>"1.72", "habilidad" => "Ultima hora", "imagen" => "https://storage.googleapis.com/pokeneas/Pokeneas/juan.jpg", "frase" => "Yo entrego resultados esta semana, o no?"]
    ];

    public function index()
    {
        $totalPokeneas = (count(PokeneasController::$pokeneas));
        $randomNumber = (rand(0,($totalPokeneas-1)));
        $randomPokenea = PokeneasController::$pokeneas[$randomNumber];
        unset($randomPokenea["imagen"]);
        return response()->json(['Pokenea' => $randomPokenea]);
    }
    public function frases(){
        $totalPokeneas = (count(PokeneasController::$pokeneas));
        $randomNumber = (rand(0,($totalPokeneas-1)));
        $randomFrase = PokeneasController::$pokeneas[$randomNumber]["frase"];
        $randomImg = PokeneasController::$pokeneas[$randomNumber]["imagen"];
        $imageData = base64_encode(file_get_contents($randomImg));
        echo '<img src="data:image/jpeg;base64,'.$imageData.'">';
        echo '<br>';
        return response()->json(['Pokenea' => $randomFrase,'docker_id' => gethostbyname(gethostname())]);
    }
}
