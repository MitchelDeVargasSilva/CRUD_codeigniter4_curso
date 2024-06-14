<div class="card">
    <div class="card-header">
        Atenção!
    </div>
    <div class="card-body">
        <div class="alert alert-<?php echo $mensagem['tipo'] ?>">
            <?php echo $mensagem['mensagem'] ?>
        </div>
        <p><?php echo anchor('/', 'Página Inicial') ?></p>
    </div>
</div>