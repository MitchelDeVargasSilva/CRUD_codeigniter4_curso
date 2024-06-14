<?php

namespace App\Models;

use CodeIgniter\Model;

class TelefoneModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'telefones';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'telefone',
        'clientes_id'
    ];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];


    /**
     * Retorna todos os telefones daquele cliente
     *
     * @param [type] $id_cliente
     * @return void
     */
    public function getByIdCliente($id_cliente)
    {
        return $this->where('clientes_id', $id_cliente)->findAll();
    }

    /**
     * Retorna o id do cliente
     *
     * @param [type] $id_telefone
     * @return void
     */
    public function getIdClienteByIdTelefone($id_telefone)
    {
        $rq = $this->find($id_telefone);

        return !is_null($rq) ? $rq['clientes_id'] : null;
    }
}
