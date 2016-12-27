<?php

class UsuarioController extends AppController{
	public function create(){
		if (Input::post("usuario")) {
			$usuario = Load::model("usuario",Input::post("usuario"));
			if ($usuario->password != Input::post("password2")) {
				Flash::error("Las contraseñas deben coincidir");
				return;
			}
			$usuario->password = Password::encriptar($usuario->password);
			if ($usuario->save()) {
				Flash::valid("Usuario Creado!");
			}else{
				Flash:error("No se pudo crear el usuario!");
			}
		}
	}
	public function logout(){
		Auth::destroy_identity();
		Flash::valid("Hasta Luego, Vuelta Pronto!");
		Router::redirect("index/index");
	}
}