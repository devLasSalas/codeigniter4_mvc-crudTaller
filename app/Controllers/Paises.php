<?php

namespace App\Controllers;

use App\Controllers\BaseController; //la plantilla del controlador general de codeigniter 
use App\Models\PaisModel;

class Paises extends BaseController    
{    
    protected $pais;

    public function __construct()
    {
        $this->pais = new PaisModel();
    }
        public function index() 
        {               
            $nombreUsuario = session()->get('usuario');
            $tipoUsuario = session()->get('type');

            $paisData = $this->pais->paisesActivos();
            $data = [
                'titulo' => 'Proyecto Taller',
                'nombre' => $nombreUsuario, 
                'subtitulo' => 'Administrar Paises', 
                'pais' => $paisData,
                 'rol' => $tipoUsuario
            ]; 

            echo view('/principal/header',$data); 
            echo view( '/paises/paises', $data);
            
        }
        public function eliminados()
        {
            $nombreUsuario = session()->get('usuario');
            $tipoUsuario = session()->get('type');

            $paisData = $this->pais->paisesEliminados();
            $data = [ 
                'titulo' => 'Proyecto Taller',
                'nombre' => $nombreUsuario, 
                'subtitulo' => 'Administrar Paises', 
                'pais' => $paisData,
                'rol' => $tipoUsuario
            ];

            echo view('/principal/header',$data); 
            echo view('paises/eliminados');
        }
        
    public function insertarPais()
    {
        $tp=$this->request->getPost('tp');
        if ($this->request->getMethod() == "post") {
            if ($tp == 1) {
                $this->pais->save([
                    'codigo' => $this->request->getPost('codigo'),
                    'nombre' => $this->request->getPost('nombre')
                ]);
            } else {
                 $this->pais->update(
                    $this->request->getPost('id'),
                    [                    
                    'codigo' => $this->request->getPost('codigo'),
                    'nombre' => $this->request->getPost('nombre')
                ]);
                
            } 
            return redirect()->to(base_url('/paises'));
        }
    }    

    public function buscarUnPais($id)
    {
        $returnData = array();
        $pais_ = $this->pais->traer_Pais($id);
        if (!empty($pais_)) {
            array_push($returnData, $pais_);
        }
        echo json_encode($returnData);
    }

    public function cambiarEstadoPais($id, $estado)
    {
        $pais_ = $this->pais->cambia_estado_Pais($id, $estado);
        return redirect()->to(base_url('/paises'));
    }


}

