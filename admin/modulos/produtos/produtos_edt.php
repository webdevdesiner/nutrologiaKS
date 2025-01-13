<?php
$idProduto = intval($_GET['id']);

$array = array('idProduto' => $idProduto);
$sql = "SELECT id_categoria_produto, nome_produto, quantidade_produto, descricao_produto, destaque_produto 
        FROM wd_produtos 
        WHERE id_produto = :idProduto";
$sth = $con->prepare($sql);
$sth->execute($array);

$total = func_pdo_count($con, "wd_produtos", " WHERE id_produto = :idProduto", $array);

if( intval($total) === 0){
    echo '<div class="ls-alert-danger ls-dismissable"><span data-ls-module="dismiss" class="ls-dismiss">&times;</span><strong>Erro!</strong> A página que você procura não foi encontrada.</div>';
}else{
    while ($l = $sth->fetch(PDO::FETCH_ASSOC)){
        $IDCategoriaProduto = intval($l['id_categoria_produto']);
        $nomeProduto        = $l['nome_produto'];
        $quantidadeProduto  = $l['quantidade_produto'];
        $descricaoProduto   = $l['descricao_produto'];
        $destaqueProduto    = $l['destaque_produto'];
    }
?>
<form action="" class="ls-form ls-form-horizontal row" id="form_produto" name="form_produto">
    <input type="hidden" id="acao" name="acao" value="atuProduto">
    <input type="hidden" id="idProduto" name="idProduto" value="<?=$idProduto?>">
    <fieldset>
        <label class="ls-label col-md-6">
            <b class="ls-label-text">Nome:*</b>
            <input type="text" id="nomeProduto" name="nomeProduto" value="<?=$nomeProduto?>" required>
        </label>
        <label class="ls-label col-md-3">
            <b class="ls-label-text">Categoria:*</b>
            <div class="ls-custom-select">
                <select class="ls-select" name="IDCategoriaProduto" id="IDCategoriaProduto" required>
                    <?php
                    $sth = func_pdo_select($con, "wd_categorias", "id_categoria, nome_categoria", "", "", "nome_categoria");
                    while($l = $sth->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <option value="<?=$l['id_categoria']?>" <? if($l['id_categoria'] == $IDCategoriaProduto) echo "selected" ?>  ><?=$l['nome_categoria']?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </label>
        <label class="ls-label col-md-3">
            <b class="ls-label-text">Quantidade:*</b>
            <input type="text" name="quantidadeProduto" id="quantidadeProduto" value="<?=$quantidadeProduto?>" required>
        </label>
    </fieldset>
    <fieldset>
        <label class="ls-label col-md-12">
            <b class="ls-label-text">Benefícios:</b>
            <textarea id="descricaoProduto" name="descricaoProduto" class="ls-textarea-resize-both"><?=$descricaoProduto?></textarea>
        </label>
    </fieldset>
    <fieldset>
        <label class="ls-label col-md-5">
            <b class="ls-label-text">Destaque:</b>
            <input type="radio" name="destaqueProduto"
            <?php if ($destaqueProduto == 1) echo "checked"; ?>
                   value="1"> Sim
            <input type="radio" name="destaqueProduto"
            <?php if ($destaqueProduto == 2) echo "checked"; ?>
                   value="2"> Não
        </label>
    </fieldset>
    <div class="ls-actions-btn ls-no-border-top ls-no-padding-top">
        <button type="submit" class="ls-btn-primary ls-ico-checkmark ls-no-margin-top" name="salvar">SALVAR</button>
        <a href="?pg=produtos" class="ls-btn ls-no-margin-top">Cancelar</a>
    </div>
</form>
<br><br>
<? } ?>
<script type="text/javascript">
    var editor = CKEDITOR.replace('descricaoProduto', { customConfig: 'config.js' });
</script>
