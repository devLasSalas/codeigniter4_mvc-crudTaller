<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartamentoModel extends Model{
    protected $table        = 'departamentos';
    protected $primaryKey   = 'id';

    protected $useAutoIncrement = true;
    
    protected $returnType     = 'array';
    protected $useSoftDeletes = false; 
    
    protected $allowedFields = ['id_pais', 'nombre', 'estado', 'fecha_crea'];
    
    protected $useTimestamps = true;
    protected $createdField  = 'fecha_crea';
    protected $updatedField  = ''; 
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    
    /* Dpto Activos */
    public function departamentosActivos() {
        $this->select('departamentos.*, paises.nombre AS P_nombre, paises.id AS P_id ');
        $this->join('paises', 'paises.id = departamentos.id_pais');
        $this->where('departamentos.estado', 'A');
        $datos = $this->findAll();
        return $datos;
        
    }
    
    /* Dpto inactivos */
    public function departamentosInactivos() {
        $this->select('departamentos.*, paises.nombre AS P_nombre, paises.id AS P_id ');
        $this->join('paises', 'paises.id = departamentos.id_pais');
        $this->where('departamentos.estado', 'E');
        $datos = $this->findAll();
        return $datos;
    }
    
    /* Traer un solo registro por el id */
    public function traer_Dpto($id){
        $this->select('departamentos.*');
        $this->where('id', $id);
        $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    }

    /* Eliminar */
    public function cambia_estado_Dpto($id, $estado)
    {
        $datos = $this->update($id, ["estado" => $estado]);
        return $datos;
    }
 



    
    public function traer_dptosByIdPais($paisSelectId) {
        $this->select('departamentos.*');
        $this->where('estado', 'A');
        $this->where('id_pais', $paisSelectId);
        $datos = $this->findAll();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
     }

}