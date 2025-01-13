<?php
$idCategoria = intval($_GET['id']);
$array = array('idCategoria' => $idCategoria);

$sql = "SELECT id_categoria, nome_categoria
        FROM wd_categorias 
        WHERE id_categoria = :idCategoria";
$sth = $con->prepare($sql);
$sth->execute($array);

$existe = func_pdo_count($con, "wd_categorias", " WHERE id_categoria = :idCategoria", $array);

if (intval($existe) === 0) {
    echo '<div class="ls-alert-danger ls-dismissable">
                    <span data-ls-module="dismiss" class="ls-dismiss">&times;</span>
                    <strong>Erro!</strong> A página que você procura não foi encontrada.
                  </div>';
} else {
    $l = $sth->fetch(PDO::FETCH_ASSOC );
    $nomeCategoria = $l['nome_categoria'];
    ?>
    <form action="" class="ls-form ls-form-horizontal row" id="form_categoria" name="form_categoria">
        <input type="hidden" id="acao" name="acao" value="atuCategoria">
        <input type="hidden" id="idCategoria" name="idCategoria" value="<?= $idCategoria ?>">
        <fieldset>
            <label class="ls-label col-md-6">
                <b class="ls-label-text">Nome da Categoria:*</b>
                <input type="text" id="nomeCategoria" name="nomeCategoria" value="<?=$nomeCategoria?>" required>
            </label>
        </fieldset>

        <div class="ls-actions-btn ls-no-border-top ls-no-padding-top">
            <button type="submit" class="ls-btn-primary ls-ico-checkmark ls-no-margin-top" name="salvar">SALVAR</button>
            <a href="?pg=categorias" class="ls-btn ls-no-margin-top">Cancelar</a>
        </div>
    </form>
    <br><br>
<? } ?>