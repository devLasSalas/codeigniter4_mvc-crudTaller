<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UsuarioModel;



class Auth extends BaseController
{

    protected $usuario;

    public function __construct()
    {
        $this->usuario = new UsuarioModel();
    }
    
    public function index()
    {
        $session = session();
        $session->destroy();

        $vistaAuth = view('/auth/auth');
        return $vistaAuth;
        
    }


    public function login()
    {
        $session = session();
     
        if($this->request->getMethod() == 'post') {
            $usuario = $this->request->getPost('usuario');
            $password = $this->request->getPost('password');

            $user = $this->usuario->buscarUsuario($usuario);
            if( $user && password_verify($password, $user['password'])) {
                
                $data = [
                    "id" => $user['id'],
                    "usuario" => $user['usuario'],
                    "type" => $user['type'],
                    "isLoggedIn" => TRUE,
                ];
                $session->set($data);
            
                return redirect()->to(base_url('/home'))->with('mensaje', '1');
            
            }else {
                // $session = session_destroy();
                $session->setFlashData('msg', 'Datos incorrectos');
                return redirect()->back();
                
            };

            // if( $usuarioBD  && password_verify($password, $usuarioBD['password'])) {
            //    echo 'Existe';
            // }else {
            //     echo 'No existe';
            // };
        };
    }

    public function salir()
    {
        $session= session();
        $session->destroy();
        return redirect()->to(base_url('/auth'));
    }


}

