<?php 

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\DepartamentoModel;
use App\Models\PaisModel;

class Departamentos extends BaseController
{
    protected $departamento;
    protected $pais;

    public function __construct()
    {
        $this->departamento = new DepartamentoModel();
        $this->pais = new PaisModel();
    }

    /* Vista principal */
    public function index()
    {
        $nombreUsuario = session()->get('usuario');
        $tipoUsuario = session()->get('type');

        $departamento = $this->departamento->departamentosActivos();
        $pais = $this->pais->paisesActivos();
        $data = [
            'titulo' => 'Proyecto Taller', 
            'nombre' => $nombreUsuario, 
            'subtitulo' => 'Administrar Departamentos',
            'departamento' => $departamento,
            'pais' => $pais,
             'rol' => $tipoUsuario
        ];

        echo view('/principal/header', $data);
        echo view('/departamentos/departamentos');
    }
    /* Vista de eliminados */
    public function eliminados()
        {
            $nombreUsuario = session()->get('usuario');
            $tipoUsuario = session()->get('type');

            $departamentoData = $this->departamento->departamentosInactivos();
            $data = [ 
                'titulo' => 'Proyecto Taller',
                'nombre' => $nombreUsuario, 
                'subtitulo' => 'Administrar Departamentos', 
                'departamento' => $departamentoData,
                'rol' => $tipoUsuario
            ];

            echo view('/principal/header',$data); 
            echo view('departamentos/eliminados');
        }


    public function insertar()
    {
        $tp=$this->request->getPost('tp');
        if ($this->request->getMethod() == "post") {
            if ($tp == 1) {
                $this->departamento->save([
                    'id_pais' => $this->request->getPost('id_pais'),
                    'nombre' => $this->request->getPost('nombre')
                ]); 
            } else {
                $this->departamento ->update(
                    $this->request->getPost('id'),
                    [                    
                    'id_pais' => $this->request->getPost('id_pais'),
                    'nombre' => $this->request->getPost('nombre')
                ]);
            } 
            return redirect()->to(base_url('/departamentos'));
        }
    }

    public function buscar_Departamento($id)
    {
        $returnData = array();
        $departamento_ = $this->departamento->traer_Dpto($id);

        if (!empty($departamento_)) {
            array_push($returnData, $departamento_);
        }
        echo json_encode($returnData);
    }

    public function eliminar($id)
    {
        $this->departamento->delete($id);

        return redirect()->to(base_url('/departamentos'));
    } 

    public function cambiarEstado($id, $estado)
    {
        $departamento_ = $this->departamento->cambia_estado_Dpto($id, $estado);
        return redirect()->to(base_url('/departamentos'));
    }
}
