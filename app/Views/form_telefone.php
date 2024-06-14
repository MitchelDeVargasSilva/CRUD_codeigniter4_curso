<div class="card">
    <div class="card-header">
        Clientes - Telefone
    </div>
    <div class="card-body">
        <p><a href="javascript:history.back()">Voltar</a>
        </p>
        <?php echo form_open('telefone/store') ?>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone" class="form-control" required autofocus>
        </div>
        <input type="submit" class="btn btn-primary" value="Salvar">
        <input type="hidden" name="clientes_id" value="<?php echo $id_cliente ?>">
        <?php echo form_close() ?>
    </div>
</div>