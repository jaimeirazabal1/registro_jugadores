<?php

class EquiposController extends AppController{
	public function index(){
		$this->titulo_pagina = "Equipos";
		$this->equipos = Load::model("equipo")->find();
	}
	public function create(){
		if (Input::post("equipo")) {
			$equipo = Load::model("equipo",Input::post("equipo"));
			if ($equipo->save()) {
				Flash::valid("Equipo Agregado!");
				Router::toAction("");
			}else{
				Flash::error("El equipo no se pudo agregar!");
			}
		}
	}
	public function jugador($id_equipo){
		if (Input::post("jugador")) {
			$jugador = Load::model("jugador",Input::post("jugador"));
			if ($jugador->save()) {
				Flash::valid("Jugador Creado Con exito!");
			}else{
				Flash::error("No se creo el jugador");
			}
		}
		$this->equipo_id = $id_equipo;
		$this->equipo = Load::model("equipo")->find($id_equipo);
		$this->jugadores = Load::model("jugador")->find("conditions: equipo_id = '$id_equipo'");
		$this->titulo_pagina = "Jugador | Equipo: ".$this->equipo->nombre;
	}
}