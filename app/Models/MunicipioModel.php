<?php

namespace App\Models;

use CodeIgniter\Model;

class MunicipioModel extends Model{
    protected $table        = 'municipios';
    protected $primaryKey   = 'id';

    protected $useAutoIncrement = true;
    
    protected $returnType     = 'array';
    protected $useSoftDeletes = false; 
    
    protected $allowedFields = ['id_departamento', 'nombre', 'estado', 'fecha_crea'];
    
    protected $useTimestamps = true;
    protected $createdField  = 'fecha_crea';
    protected $updatedField  = ''; 
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;


    public function municipiosActivos() {
        $this->select('municipios.*, 
        departamentos.nombre AS Dpto_nombre, departamentos.id AS Dpto_id, 
        paises.id AS P_id, paises.nombre AS P_nombre ');
        $this->join('departamentos', 'municipios.id_departamento = departamentos.id');
        $this->join('paises', 'departamentos.id_pais = paises.id');
        $this->where('municipios.estado', 'A');
        $datos = $this->findAll();
        return $datos;
         
     }
    public function municipiosInactivos() {
        $this->select('municipios.*, 
        departamentos.nombre AS Dpto_nombre, departamentos.id AS Dpto_id, 
        paises.id AS P_id, paises.nombre AS P_nombre ');
        $this->join('departamentos', 'municipios.id_departamento = departamentos.id');
        $this->join('paises', 'departamentos.id_pais = paises.id');
        $this->where('municipios.estado', 'E');
        $datos = $this->findAll();
        return $datos;
         
     }

     /* Traer un municipio */
     public function traer_Municipio($id) {
        $this->select('municipios.*,
        departamentos.nombre AS Dpto_nombre, departamentos.id AS Dpto_id, 
        paises.id AS P_id, paises.nombre AS P_nombre');
        $this->join('departamentos', 'municipios.id_departamento = departamentos.id');
        $this->join('paises', 'departamentos.id_pais = paises.id');
        $this->where('municipios.id', $id);
        $datos = $this->first();
        return $datos;
     }


     /* Eliminar( Cambiar estado ) */
     public function cambia_estado_Municipio($id, $estado) {

         $datos = $this->update($id, ["estado" => $estado]);
         return $datos;

     }


     /*  */
     public function traer_municipiosByIdDpto($dptoSelectId) {
        $this->select('municipios.*');
        $this->where('estado', 'A');
        $this->where('id_departamento', $dptoSelectId);
        $datos = $this->findAll();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
     }

     
}