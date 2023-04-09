<?php

namespace App\Controllers;

use App\Controllers\BaseController; //la plantilla del controlador general de codeigniter 

use App\Models\SalarioModel;
use App\Models\EmpleadoModel;

class Salarios extends BaseController    
{    

    protected $salario;
    protected $empleado;

    public function __construct()
    {
        $this->salario =  new SalarioModel();
        $this->empleado =  new EmpleadoModel();
        
    }
        public function index() 
        {            
            $nombreUsuario = session()->get('usuario');
            $tipoUsuario = session()->get('type');

            $salarios = $this->salario->salariosActivos();
            $empleados = $this->empleado->empleadosActivos();

            $data = [
                'titulo' => 'Proyecto Taller',
                'nombre' => $nombreUsuario,
                 'rol' => $tipoUsuario, 
                'subtitulo' => 'Administrar Salarios', 
                'salario' => $salarios,
                'empleado' => $empleados
            ];  

            $salarios = view('principal/header', $data).view('salarios/salarios', $data);
            return $salarios;

        }
        
        public function insertar()
        {
            $tp=$this->request->getPost('tp');
            if($this->request->getMethod() == "post") {
                if( $tp == 1 ) {

                    $periodo = $this->request->getPost('periodo');
                    $id_empleado = $this->request->getPost('empleado');
                    $sueldo = $this->request->getPost('sueldo');

                    $this->salario->save([
                        'periodo' => $this->request->getPost('periodo'),
                        'id_empleado' => $this->request->getPost('empleado'),
                        'sueldo' => $this->request->getPost('sueldo'),
                    ]);
                }else {
                    $this->salario->update(
                        $this->request->getPost('id'),
                        [                    
                        'periodo' => $this->request->getPost('periodo'),
                        'id_empleado' => $this->request->getPost('empleado'),
                        'sueldo' => $this->request->getPost('sueldo'),
                    ]);
                }
                return redirect()->to(base_url('/salarios'));
            }
        }

        //Vista eliminados
        public function eliminados() 
        {
            $nombreUsuario = session()->get('usuario');
            $tipoUsuario = session()->get('type');

            $salarios = $this->salario->salariosInactivos();

            $data = [
                'titulo' => 'Proyecto Taller',
                'nombre' => $nombreUsuario, 
                'subtitulo' => 'Administrar Salarios', 
                'salario' => $salarios,
                'rol' => $tipoUsuario
            ];  

            $salarios = view('principal/header', $data).view('salarios/eliminados', $data);
            return $salarios;
        }


        public function buscar_Salario($id) 
        {
            $returnData = array();
            $salario_ = $this->salario->traer_salario($id);

            if (!empty($salario_)) {
                array_push($returnData, $salario_);
            }
            echo json_encode($returnData);
        }

        public function cambiarEstado($id, $estado)
        {
            $salario_ = $this->salario->cambia_estado_Salario($id, $estado);
            return redirect()->to(base_url('/salarios'));
        }

}
