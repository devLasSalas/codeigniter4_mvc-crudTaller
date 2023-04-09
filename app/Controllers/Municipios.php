<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\MunicipioModel;
use App\Models\DepartamentoModel;
use App\Models\PaisModel;



class Municipios extends BaseController
{

    protected $municipio;
    protected $departamento;
    protected $pais;

    
    public function __construct()
    {
        $this->municipio = new MunicipioModel();
        $this->departamento = new DepartamentoModel();
        $this->pais = new PaisModel();

    }

    public function index()
    {
        $nombreUsuario = session()->get('usuario');
        $tipoUsuario = session()->get('type');

        $municipio = $this->municipio->municipiosActivos();
        $pais = $this->pais->paisesActivos();

        $data = [
            'titulo' => 'Proyecto Taller', 
            'nombre' => $nombreUsuario, 
            'subtitulo' => 'Administrar Municipios',
            'municipio' => $municipio,
            'pais' => $pais,
             'rol' => $tipoUsuario

        ];

        echo view('/principal/header', $data);
        echo view('/municipios/municipios', $data);
    }

    /* Vista principal */
    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        if( $this->request->getMethod() == 'post' ) {
            if($tp == 1) {
                $this->municipio->save([
                    "id_departamento" => $this->request->getPost('dpto'),
                    "nombre" => $this->request->getPost('nombre')
                ]);

            }else {
                $this->municipio->update(
                    $this->request->getPost('id'),
                    [
                    'id_departamento' => $this->request->getPost('dpto'),
                    'nombre' => $this->request->getPost('nombre')
                    ]);
            }
            return redirect()->to(base_url('/municipios'));
        }
    }

    /* Vista de eliminados */
    public function eliminados()
        {
            $nombreUsuario = session()->get('usuario');
            $tipoUsuario = session()->get('type');

            $municipioData = $this->municipio->municipiosInactivos();
            $data = [ 
                'titulo' => 'Proyecto Taller',
                'nombre' => $nombreUsuario, 
                'subtitulo' => 'Administrar Municipios', 
                'municipio' => $municipioData,
                'rol' => $tipoUsuario
            ];

            echo view('/principal/header',$data); 
            echo view('municipios/eliminados');
        }


    public function buscarDptoByIdPais($paisSelectId)
    {
        $dptos_ = $this->departamento->traer_dptosByIdPais($paisSelectId);
        echo json_encode($dptos_);
    }


    public function buscar_municipio($id)
    {
        $returnData = array();
        $municipio_ = $this->municipio->traer_Municipio($id);
        if(!empty($municipio_)) {
            array_push($returnData, $municipio_);
        }
        echo json_encode($returnData);
    }

    public function cambiarEstado($id, $estado)
    {
        $municipio_ = $this->municipio->cambia_estado_Municipio($id, $estado);
        return redirect()->to(base_url('/municipios'));
    }
}