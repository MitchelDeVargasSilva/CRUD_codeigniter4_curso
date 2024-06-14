<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClienteModel;
use App\Models\TelefoneModel;

class Telefone extends BaseController
{
    /**
     * Chama o form de cadastro de telefone
     *
     * @return void
     */
    public function create($id_cliente)
    {
        echo view('common/header');
        echo view('form_telefone', [
            'id_cliente' => $id_cliente
        ]);
        echo view('common/footer');
    }

    /**
     * Salva o telefone no banco de dados
     *
     * @return void
     */
    public function store()
    {
        $post = $this->request->getPost();

        $telefoneModel = new TelefoneModel();

        if ($telefoneModel->save($post)) {
            return redirect()->to("/cliente/edit/{$post['clientes_id']}")->with('mensagem_telefone', 'Telefone inserido com sucesso.');
        } else {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Erro ao salvar o telefone.',
                'tipo' => 'danger'
            ]);
        }
    }

    /**
     * Exclui um telefone do cliente.
     *
     * @param [type] $id
     * @param [type] $id_cliente
     * @return void
     */
    public function delete($id, $id_cliente)
    {

        $telefoneModel = new TelefoneModel();

        if ($telefoneModel->where('clientes_id', $id_cliente)->delete($id)) {
            return redirect()->to("/cliente/edit/{$id_cliente}")->with('mensagem_telefone', 'Telefone excluído com sucesso.');
        } else {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Erro ao excluir o telefone.',
                'tipo' => 'danger'
            ]);
        }
    }
}
