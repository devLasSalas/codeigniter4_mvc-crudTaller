<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpleadoModel extends Model{
    protected $table        = 'empleados';
    protected $primaryKey   = 'id';

    protected $useAutoIncrement = true;
    
    protected $returnType     = 'array';
    protected $useSoftDeletes = false; 
    
    protected $allowedFields = ['nombres', 'apellidos', 'nacimiento', 'id_municipio', 'id_cargo', 'estado', 'fecha_crea'];
    
    protected $useTimestamps = true;
    protected $createdField  = 'fecha_crea';
    protected $updatedField  = ''; 
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;


    public function empleadosActivos() {
        $this->select('empleados.*, 
        municipios.id AS M_id, municipios.nombre AS M_nombre,
        cargos.id AS C_id, cargos.nombre AS C_nombre,
        departamentos.id AS Dpto_id, departamentos.nombre AS Dpto_nombre,
        paises.id AS P_id, paises.nombre AS P_nombre');
        $this->join('municipios', 'municipios.id = empleados.id_municipio');
        $this->join('cargos', 'cargos.id = empleados.id_cargo');
        $this->join('departamentos', 'departamentos.id = municipios.id_departamento');
        $this->join('paises', 'paises.id = departamentos.id_pais');
        $this->where('empleados.estado', 'A');
        $this->orderBy(0);
        $datos = $this->findAll();
        return $datos;
    }
    public function empleadosInactivos() {
        $this->select('empleados.*, 
        municipios.id AS M_id, municipios.nombre AS M_nombre,
        cargos.id AS C_id, cargos.nombre AS C_nombre,
        departamentos.id AS Dpto_id, departamentos.nombre AS Dpto_nombre,
        paises.id AS P_id, paises.nombre AS P_nombre');
        $this->join('municipios', 'municipios.id = empleados.id_municipio');
        $this->join('cargos', 'cargos.id = empleados.id_cargo');
        $this->join('departamentos', 'departamentos.id = municipios.id_departamento');
        $this->join('paises', 'paises.id = departamentos.id_pais');
        $this->where('empleados.estado', 'E');
        $this->orderBy(2);
        $datos = $this->findAll();
        return $datos;
    }



    public function traer_Empleado($id) {
        $this->select('empleados.*, 
        municipios.id AS M_id, municipios.nombre AS M_nombre,
        cargos.id AS C_id, cargos.nombre AS C_nombre');
        $this->join('municipios', 'municipios.id = empleados.id_municipio');
        $this->join('cargos', 'cargos.id = empleados.id_cargo');
        $this->where('empleados.id', $id);
        $datos = $this->first();
        return $datos;
    }


    public function cambia_estado_Empleado($id, $estado) {

         $datos = $this->update($id, ["estado" => $estado]);
         return $datos;

     }

    
}