<?php

class JugadoresController extends AppController{

	public function index(){
		$this->titulo_pagina = "Jugador";
		if (Input::post("jugador")) {
			$jugador = Load::model("jugador",Input::post("jugador"));
			
			if ($jugador->save()) {
				Flash::valid("Jugador Creado Con exito!");
			}else{
				Flash::error("No se creo el jugador");
			}
		}
		$this->jugadores = Load::model("jugador")->find();
	}

}