<?php

namespace App\Controllers;

use CodeIgniter\Pager\Pager;

use App\Controllers\BaseController;

use App\Models\EmpleadoModel;
use App\Models\MunicipioModel;
use App\Models\DepartamentoModel;
use App\Models\PaisModel;
use App\Models\CargoModel;

class Empleados extends BaseController
{

    protected $empleado;
    protected $municipio;
    protected $departamento;
    protected $pais;
    protected $cargo;

    public function __construct()
    {
        $this->empleado = new EmpleadoModel();
        $this->municipio = new MunicipioModel();
        $this->departamento = new DepartamentoModel();
        $this->pais = new PaisModel();
        $this->cargo = new CargoModel();
    }

    public function index()
    {
        $nombreUsuario = session()->get('usuario');
        $tipoUsuario = session()->get('type');

    
        $empleados = $this->empleado->empleadosActivos();
        $municipios = $this->municipio->municipiosActivos();
        $paises = $this->pais->paisesActivos();
        $cargos = $this->cargo->cargosActivos();

        

       

        $data = [
            'titulo' => 'Proyecto Taller', 
            'nombre' => $nombreUsuario, 
            'subtitulo' => 'Administrar Empleados',
            'empleado' => $empleados,
            'municipio' => $municipios,
            'cargo' => $cargos,
            'pais' => $paises,
             'rol' => $tipoUsuario
        ];
        
        echo view('principal/header', $data );
        echo view('empleados/empleados', $data);
    }

    //Vista principal
    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        if( $this->request->getMethod() == 'post' ) {
            if( $tp == 1) {
               $this->empleado->save([
                   "nombres" => $this->request->getPost('nombres'),
                   "apellidos" => $this->request->getPost('apellidos'),
                   "nacimiento" => $this->request->getPost('nacimiento'),
                   "id_municipio" => $this->request->getPost('municipios'),
                   "id_cargo" => $this->request->getPost('cargos')
               ]);
                
            }else if($tp == 2) {
                $idEmpleado = $this->request->getPost('id');
                $this->empleado->update($idEmpleado, [
                    "nombres" => $this->request->getPost('nombres'),
                    "apellidos" => $this->request->getPost('apellidos'),
                    "nacimiento" => $this->request->getPost('nacimiento'),
                    "id_municipio" => $this->request->getPost('municipios'),
                    "id_cargo" => $this->request->getPost('cargos') 
                ]);
            }

            
        }
        return redirect()->to(base_url('/empleados'));
    }

    //Vista eliminados
    public function eliminados()
    {
        $nombreUsuario = session()->get('usuario');
        $tipoUsuario = session()->get('type');

        $empleadosData = $this->empleado->empleadosInactivos();

        $data = [
            'titulo' => 'Proyecto Taller', 
            'nombre' => $nombreUsuario, 
            'subtitulo' => 'Administrar Empleados',
            'empleado' => $empleadosData,
            'rol' => $tipoUsuario
        ];

        echo view('principal/header', $data);
        echo view('empleados/eliminados', $data);
    }

    public function cambiarEstado($id, $estado)
    {
         $empleado_ = $this->empleado->cambia_estado_Empleado($id, $estado);
        return redirect()->to(base_url('/empleados'));
    }


    public function buscar_empleado($id)
    {
        $returnData = array();
        $empleado_ = $this->empleado->traer_Empleado($id);
        if(!empty($empleado_)) {
            array_push($returnData, $empleado_);
        }
        echo json_encode($returnData);
    }

    // $Municipio
    public function buscar_municipio_dpto_pais($id)
    {
        $returnData = array();
        $municipio_ = $this->municipio->traer_Municipio($id);
        if(!empty($municipio_)) {
            array_push($returnData, $municipio_);
        }
        echo json_encode($returnData);
    }



    //$Departamento
    public function traer_dptos($paisSelectId)
    {
        $dptos_ = $this->departamento->traer_dptosByIdPais($paisSelectId);
        echo json_encode($dptos_);
    }

    //$Municipio
    public function traer_municipios($dptoSelectId)
    {
        $municipios_ = $this->municipio->traer_municipiosByIdDpto($dptoSelectId);
        echo json_encode($municipios_);
    } 



}