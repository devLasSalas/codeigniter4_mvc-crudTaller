<?php

namespace App\Models;

use CodeIgniter\Model;

class SalarioModel extends Model{
    protected $table        = 'salarios';
    protected $primaryKey   = 'id';

    protected $useAutoIncrement = true;
    
    protected $returnType     = 'array';
    protected $useSoftDeletes = false; 
    
    protected $allowedFields = ['periodo', 'id_empleado', 'sueldo', 'estado', 'fecha_crea'];
    
    protected $useTimestamps = true;
    protected $createdField  = 'fecha_crea';
    protected $updatedField  = ''; 
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    /* Cargos Activos */
    public function salariosActivos() {
        $this->select('salarios.*, empleados.nombres AS E_nombres, empleados.apellidos AS E_apellidos');
        $this->join('empleados', "empleados.id = salarios.id_empleado");
        $this->where('salarios.estado', 'A');
        $datos = $this->findAll();
        return $datos;
    }
    /* Cargos Inactivos */
    public function salariosInactivos() {
        $this->select('salarios.*, empleados.nombres AS E_nombres, empleados.apellidos AS E_apellidos');
        $this->join('empleados', "empleados.id = salarios.id_empleado");
        $this->where('salarios.estado', 'E');
        $datos = $this->findAll();
        return $datos;
    }

    /* Uno solo */
    public function traer_salario($id) {
        $this->select('salarios.*, empleados.nombres AS E_nombres, empleados.apellidos AS E_apellidos');
        $this->join('empleados', "empleados.id = salarios.id_empleado");
        $this->where('salarios.id', $id);
        $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    }

    /* Eliminar */
    public function cambia_estado_Salario($id, $estado)
    {
        $datos = $this->update($id, ["estado" => $estado]);
        return $datos;
    }
}