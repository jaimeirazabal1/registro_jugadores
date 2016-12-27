<?php

/**
 * Controller por defecto si no se usa el routes
 * 
 */
class IndexController extends AppController
{

    public function index()
    {
    	if (Input::post("password") and Input::post("username")) {
    		# code...
            $pwd = Password::encriptar(Input::post("password"));
            $usuario=Input::post("username");
 
            $auth = new Auth("model", "class: usuario", "username: $usuario", "password: $pwd");
            if ($auth->authenticate()) {
                Router::redirect("index/dash");
            } else {
                Flash::error("Nombre de usuario o contraseña invalidos!");
            }        
    	}
    }
    public function dash(){
    	$this->titulo_pagina = "Dashboard";
    }

}
