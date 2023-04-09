<?php

namespace App\Models;

use CodeIgniter\Model;

class CargoModel extends Model{
    protected $table        = 'cargos';
    protected $primaryKey   = 'id';

    protected $useAutoIncrement = true;
    
    protected $returnType     = 'array';
    protected $useSoftDeletes = false; 
    
    protected $allowedFields = ['nombre', 'estado', 'fecha_crea'];
    
    protected $useTimestamps = true;
    protected $createdField  = 'fecha_crea';
    protected $updatedField  = ''; 
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    /* Cargos Activos */
    public function cargosActivos() {
        $this->select('cargos.*');
        $this->where('estado', 'A');
        $datos = $this->findAll();
        return $datos;
    }
    /* Cargos Inactivos */
    public function cargosInactivos() {
        $this->select('cargos.*');
        $this->where('estado', 'E');
        $datos = $this->findAll();
        return $datos;
    }

    /* Uno solo */
    public function traer_cargo($id) {
        $this->select('cargos.*');
        $this->where('id', $id);
        $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    }

    /* Eliminar */
    public function cambia_estado_Cargo($id, $estado)
    {
        $datos = $this->update($id, ["estado" => $estado]);
        return $datos;
    }
}