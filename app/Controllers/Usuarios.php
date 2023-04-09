<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UsuarioModel;



class Usuarios extends BaseController
{

    protected $usuario;

    public function __construct()
    {
        $this->usuario = new UsuarioModel();
    }
    
    public function index()
    {   
        $nombreUsuario = session()->get('usuario');
        $tipoUsuario = session()->get('type');

        $usuarioData = $this->usuario->usuariosActivos();

        $data = [
            'titulo' => 'Proyecto Taller', 
            'nombre' => $nombreUsuario, 
            'subtitulo' => 'Administrar Usuarios',
            'usuario' => $usuarioData,
             'rol' => $tipoUsuario
        ];

        $vistaUsuario = view('/principal/header', $data).view('usuarios/usuarios', $data);
        return $vistaUsuario;
        
    }

    public function insertar()
    {
        $tp=$this->request->getPost('tp');
        if ($this->request->getMethod() == "post") {
            if ($tp == 1) {
                $password = $this->request->getPost('password');
                
                $passwordHasheada = password_hash($password, PASSWORD_DEFAULT);

                $this->usuario->save([
                    'usuario' => $this->request->getPost('usuario'),
                    'email' => $this->request->getPost('email'),
                    'usuario_crea' => $this->request->getPost('idUsuarioCrea'),
                    'password' => $passwordHasheada 

                ]);
            } else {
                 $this->usuario->update(
                    $this->request->getPost('id'),
                    [                    
                        'usuario' => $this->request->getPost('usuario'),
                        'email' => $this->request->getPost('email'),
                        'usuario_crea' => $this->request->getPost('idUsuarioCrea'),
                        'password' => $this->request->getPost('password'),
                ]);
                
            } 
            return redirect()->to(base_url('/usuarios'));
        }
    }

    public function buscarUsuario($id) 
    {
        $returnData = array();
        $usuario_ = $this->usuario->informacionUsuario($id);
        if (!empty($usuario_)) {
            array_push($returnData, $usuario_);
        }
        echo json_encode($returnData);
    }


    public function login()
    {
        if($this->request->getMethod() == 'post') {
            $usuario = $this->request->getPost('usuario');
            $password = $this->request->getPost('password');

            $result = $this->usuario->usuariosActivos();
            return redirect();
        }
    }
}