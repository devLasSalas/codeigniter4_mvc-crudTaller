<?php

namespace App\Controllers;

use App\Controllers\BaseController; //la plantilla del controlador general de codeigniter 

class Principal extends BaseController    
{    
    public function __construct()
    {

    }
        public function index() 
        {            

            $nombreUsuario = session()->get('usuario');
            $tipoUsuario = session()->get('type');

            $data = ['titulo' => 'Proyecto Taller','nombre' => $nombreUsuario, 'rol' => $tipoUsuario]; 
            echo view( '/principal/header', $data );
            // Mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo.
            echo view('/principal/principal',$data); 
        }       

}
