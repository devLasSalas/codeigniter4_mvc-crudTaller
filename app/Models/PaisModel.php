<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class PaisModel extends Model{
    protected $table      = 'paises'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType     = 'array';  /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['codigo','nombre','estado', 'fecha_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField  = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField  = ''; /*fecha automatica para la edicion */
    protected $deletedField  = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    /* P activos */
    public function paisesActivos() {
        $this->select('paises.*');
        $this->where('estado', 'A');
        $datos = $this->findAll();
        return $datos;
    }
    /* P inactivos */
    public function paisesEliminados() {
        $this->select('paises.*');
        $this->where('estado', 'E');
        $datos = $this->findAll();
        return $datos;
    }
    
    
    /* Uno solo */
    public function traer_Pais($id) {
        $this->select('paises.*');
        $this->where('id', $id);
        $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    }

    /* Eliminar */
    public function cambia_estado_Pais($id, $estado)
    {
        $datos = $this->update($id, ["estado" => $estado]);
        return $datos;
    }
    
   
}



