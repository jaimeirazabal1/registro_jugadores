<?php

class BuscadorController extends AppController{

	public function index(){

		View::template(null);
		$where= array();
		$jugadores = Load::model("jugadores");
		if (Input::post('seccion')) {
			$where[] = " seccion='".strtoupper(Input::post("seccion"))."'";
		}
		if(Input::post('pos')){
			$where[] = " posicion='".strtoupper(Input::post("pos"))."'";
		}
		if(Input::post('ap')){
			$where[] = " apellidopaterno='".strtoupper(Input::post("ap"))."'";
		}
		if(Input::post('am')){
			$where[] = " apellidomaterno='".strtoupper(Input::post("am"))."'";
		}
		if(Input::post('nombres')){
			$where[] = " nombre='".strtoupper(Input::post("nombres"))."'";
		}

		// var_dump($where);

		$sql = "SELECT * from jugadores where ".implode(' and ', $where). " order by id asc limit 40";
		// echo "<br>";
		// echo $sql;
		// echo "<br>";
		$results = $jugadores->find_all_by_sql($sql);
		
		$this->results = $results;

	}
}