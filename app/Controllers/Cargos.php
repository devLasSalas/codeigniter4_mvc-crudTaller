<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CargoModel;

class Cargos extends BaseController
{

    protected $cargo;

    public function __construct()
    {
        $this->cargo = new CargoModel();
    }

    public function index()
    {
        $nombreUsuario = session()->get('usuario');
        $tipoUsuario = session()->get('type');

        $cargo = $this->cargo->cargosActivos();
        $data = [
            'titulo' => 'Proyecto Taller', 
            'nombre' => $nombreUsuario, 
            'subtitulo' => 'Administrar Cargos',
            'cargo' => $cargo,
             'rol' => $tipoUsuario
        ];

        echo view('/principal/header', $data);
        echo view('/cargos/cargos', $data);

    }

    public function eliminados()
        {
            $nombreUsuario = session()->get('usuario');
            $tipoUsuario = session()->get('type');

            $cargosData = $this->cargo->cargosInactivos();
            $data = [ 
                'titulo' => 'Proyecto Taller',
                'nombre' => $nombreUsuario, 
                'subtitulo' => 'Administrar Cargos', 
                'cargo' => $cargosData,
                'rol' => $tipoUsuario
            ];

            echo view('/principal/header',$data); 
            echo view('cargos/eliminados');
        }

    public function insertar()
    {
        $tp=$this->request->getPost('tp');
        if ($this->request->getMethod() == "post") {
            if ($tp == 1) {
                $this->cargo->save([
                    'nombre' => $this->request->getPost('nombre')
                ]);
            } else {
                 $this->cargo->update(
                    $this->request->getPost('id'),
                    [                    
                    'nombre' => $this->request->getPost('nombre')
                ]);
                
            } 
            return redirect()->to(base_url('/cargos'));
        }
    }

    public function buscar_cargo($id)
    {
        $returnData = array();
        $cargo_ = $this->cargo->traer_cargo($id);
        if (!empty($cargo_)) {
            array_push($returnData, $cargo_);
        }
        echo json_encode($returnData);
    }

    public function cambiarEstado($id, $estado)
    {
        $cargo_ = $this->cargo->cambia_estado_Cargo($id, $estado);  
        return redirect()->to(base_url('/cargos'));
    }
}