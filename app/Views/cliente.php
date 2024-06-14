<script>
    function confirma() {
        if (!confirm("Deseja excluir este registros?")) {
            return false;
        }
        return true;
    }
</script>
<div class="card">
    <div class="card-header">
        Clientes cadastrados (<?php echo count($clientes) ?>)
    </div>
    <div class="card-body">
        <p><?php echo anchor('/cliente/create', 'Novo Cliente', ['class' => 'btn btn-primary']) ?></p>
        <p><?php echo anchor('/', 'Página Inicial') ?></p>
        <table class="table table-hover">
            <tr class="text-white bg-dark">
                <th>Código</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th class="text-center">Ações</th>
            </tr>
            <?php foreach ($clientes as $cliente) : ?>
                <tr>
                    <td><?php echo $cliente['id']  ?></td>
                    <td><?php echo $cliente['nome']  ?></td>
                    <td><?php echo $cliente['email']  ?></td>
                    <td class="text-center">
                        <?php echo anchor("cliente/edit/{$cliente['id']}", '<i class="bi bi-pencil"></i>Editar') ?>
                        |
                        <?php echo anchor("cliente/delete/{$cliente['id']}", 'Excluir', ['onclick' => 'return confirma()']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php echo $pager->links('default', 'meu_template') ?>
    </div>
</div>