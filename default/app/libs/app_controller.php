<?php
/**
 * @see Controller nuevo controller
 */
require_once CORE_PATH . 'kumbia/controller.php';

/**
 * Controlador principal que heredan los controladores
 *
 * Todas las controladores heredan de esta clase en un nivel superior
 * por lo tanto los metodos aqui definidos estan disponibles para
 * cualquier controlador.
 *
 * @category Kumbia
 * @package Controller
 */
class AppController extends Controller
{

    final protected function initialize()
    {	
    	$publicas = array("index/index","usuario/create","usuario/logout");
    	$actual = Router::get("controller")."/".Router::get("action");
    	
    	if (!Auth::is_valid() and !in_array($actual, $publicas)) {
    		Flash::info("Acceso denegado!");
    		Router::redirect("index/index");
    	}
    }

    final protected function finalize()
    {
        
    }

}
