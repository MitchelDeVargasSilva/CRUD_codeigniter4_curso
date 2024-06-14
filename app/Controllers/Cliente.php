<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClienteModel;
use App\Models\TelefoneModel;

class Cliente extends BaseController
{
    /**
     * Chama a view de listagem de clientes
     *
     * @return void
     */
    public function index()
    {

        $clienteModel = new ClienteModel();

        echo view('common/header');
        echo view('cliente', [
            'clientes' => $clienteModel->paginate(3),
            'pager' => $clienteModel->pager
        ]);
        echo view('common/footer');
    }
    /**
     * Chama a view de cadastro de clientes
     *
     * @return void
     */
    public function create()
    {
        echo view('common/header');
        echo view('form', [
            'titulo' => 'Cadastro de Cliente'
        ]);
        echo view('common/footer');
    }

    /**
     * Salva o cliente no banco dados.
     *
     * @return void
     */
    public function store()
    {
        $post = $this->request->getPost();

        $clienteModel = new ClienteModel();

        if ($clienteModel->save($post)) {
            if (!empty($post['id'])) {
                return redirect()->to('/mensagem')->with('mensagem', [
                    'mensagem' => 'Dados salvos com sucesso.',
                    'tipo' => 'success'
                ]);
            }
            return redirect()->to("/cliente/edit/{$clienteModel->insertID}")->with('mensagem', [
                'mensagem' => 'Dados salvos com sucesso',
                'tipo' => 'success'
            ]);
        } else {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Erro ao salvar os dados.',
                'tipo' => 'danger'
            ]);
        }
    }

    /**
     * Chama a view de edição com o cliente carregado
     *
     * @param [type] $id
     * @return void
     */
    public function edit($id)
    {
        $clienteModel = new ClienteModel();
        $telefoneModel = new TelefoneModel();

        $dadosCliente = $clienteModel->find($id);

        if (is_null($dadosCliente)) {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Erro - Cliente não encontrado',
                'tipo' => 'danger'
            ]);
        }

        $telefonesCliente = $telefoneModel->getByIdCliente($dadosCliente['id']);

        echo view('common/header');
        echo view('form', [
            'titulo' => 'Edição de Cliente',
            'telefonesCliente' => $telefonesCliente,
            'dadosCliente' => $dadosCliente
        ]);
        echo view('common/footer');
    }

    /**
     * Exclui o cliente do banco de dados.
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id)
    {

        $clienteModel = new ClienteModel();

        if ($clienteModel->delete($id)) {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Cliente excluído com sucesso!',
                'tipo' => 'info'
            ]);
        } else {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Erro ao excluir o cliente.',
                'tipo' => 'danger'
            ]);
        }
    }
}
