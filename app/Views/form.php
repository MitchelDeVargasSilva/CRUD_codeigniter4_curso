<script>
    function confirma() {
        if (!confirm("Deseja excluir este telefone?")) {
            return false;
        }

        return true;
    }
</script>

<div class="card">
    <div class="card-header">
        Clientes - <?php echo empty($titulo) ? 'Cadastro/Edição' : $titulo; ?>
    </div>
    <div class="card-body">
        <p><?php echo anchor('cliente', 'Voltar') ?></p>
        <?php echo form_open('cliente/store') ?>

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" value="<?php echo isset($dadosCliente) ? $dadosCliente['nome'] : '' ?>" name="nome" id="nome" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" value="<?php echo isset($dadosCliente) ? $dadosCliente['email'] : '' ?>" name="email" id="email" class="form-control" required>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                Telefones
            </div>
            <div class="card-body">
                <?php $mensagem = session()->getFlashdata('mensagem_telefone'); ?>
                <?php if (!empty($mensagem)) : ?>
                    <div class="alert alert-success"><?php echo $mensagem ?></div>
                <?php endif; ?>
                <?php if (isset($dadosCliente['id'])) : ?>
                    <a href="<?php echo base_url("telefone/create/{$dadosCliente['id']}") ?>" class="btn btn-secondary btn-sm">Inserir Telefone</a>
                <?php else : ?>
                    <a href="javascript:;" class="btn btn-secondary btn-sm disabled" disabled>Inserir Telefone</a>
                <?php endif; ?>
                <?php if (isset($dadosCliente['id'])) : ?>
                    <?php if (count($telefonesCliente) > 0) : ?>
                        <ul>
                            <?php foreach ($telefonesCliente as $telefoneCliente) : ?>
                                <li class="my-3 pr-3"><a href="<?php echo base_url("telefone/delete/{$telefoneCliente['id']}/{$dadosCliente['id']}") ?>" onclick="return confirma()" class="btn btn-sm btn-danger" title="Excluir Telefone">X</a> - <?php echo $telefoneCliente['telefone'] ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else : ?>
                        <p class="text-danger">Cliente sem telefones cadastrados</p>
                    <?php endif; ?>
                <?php else : ?>
                    <p><small>Salve o cliente antes de inserir um telefone</small></p>
                <?php endif; ?>
            </div>
        </div>

        <input type="submit" class="btn btn-primary" value="Salvar">

        <input type="hidden" name="id" value="<?php echo isset($dadosCliente) ? $dadosCliente['id'] : '' ?>">

        <?php echo form_close() ?>
    </div>
</div>