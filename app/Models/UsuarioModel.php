<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model{
    protected $table        = 'usuarios';
    protected $primaryKey   = 'id';

    protected $useAutoIncrement = true;
    
    protected $returnType     = 'array';
    protected $useSoftDeletes = false; 
    
    protected $allowedFields = ['usuario', 'email', 'password', 'estado', 'usuario_crea', 'fecha_crea'];
    
    protected $useTimestamps = true;
    protected $createdField  = 'fecha_crea';
    protected $updatedField  = ''; 
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    /* Cargos Activos */
    public function usuariosActivos() {
        $this->select('usuarios.*');
        $this->where('estado', 'A');
        $datos = $this->findAll();

        return $datos;
    }
    /* Cargos Inactivos */
    public function usuariosInactivos() {
        $this->select('usuarios.*');
        $this->where('estado', 'E');
        $datos = $this->findAll();
        return $datos;
    }

    /* Uno solo */
    public function informacionUsuario($id) {
        $this->select('usuarios.*');
        $this->where('id', $id);
        $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    }

    /* Eliminar */
    public function actualizarEstadoUsuario($id, $estado)
    {
        $datos = $this->update($id, ["estado" => $estado]);
        return $datos;
    }



    /* Auth */
    public function buscarUsuario($usuario) {
        $this->select('usuarios.*');
        $this->where('usuario', $usuario);
        $result = $this->first();
       return $result;
    }
}