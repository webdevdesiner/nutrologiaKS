<?php
$idProduto = intval($_GET['id']);
$array['idProduto'] = $idProduto;

$total = func_pdo_count($con, "wd_produtos_fotos", " WHERE id_produto_foto = :idProduto", $array);
?>
<div id="sending-stats">
    <div>
        <?php if($total == 0){ ?>
        <a href="#" id="<?= $idProduto; ?>" class="ls-btn-primary abreModalAdicionaFotoProduto ls-ico-plus"> ADICIONAR FOTO</a>
        <?php } ?>
        <a href="?pg=produtos" class="ls-btn">Voltar</a>
    </div>
</div>
<br>
<?php
$colunas = 4;
if ($total > 0) {
    $sql = "SELECT tab1.id_foto, tab1.arquivo_foto, tab1.descricao_foto, 
                   tab2.id_produto, tab2.capa_produto
		FROM wd_produtos_fotos tab1, wd_produtos tab2
		WHERE tab1.id_produto_foto = :idProduto
        AND tab1.id_produto_foto = tab2.id_produto";
    $array['idProduto'] = $idProduto;

    $sth = $con->prepare($sql);

    try {
        $sth->execute($array);
    } catch (PDOException $ex) {
        $json['status'] = 2;
        $json['titulo'] = 'Ocorreu um problema!';
        $json['msg'] = '<p> No momento não foi possível exibir as fotos.</p>';
    }

    $i = 0;
    ?>
    <fieldset class="ls-box-filter">
    <div>
        <?
            while ($l = $sth->fetch(PDO::FETCH_ASSOC)){
                if( (($i % $colunas) == 0) && ($i != 0) ){
                    echo "</div><div>";
                }
                ?>
                <div class="col-md-3 ls-no-padding">
        
                    <div class="images">
                        <a href="<?= DIR_MODS_PRODUTOS_URL . $l['arquivo_foto'] ?>" class="clbx">
                            <img src="<?=SITEURL?>/php/class/class.Thumb.php?src=<?= DIR_MODS_PRODUTOS_URL . $l["arquivo_foto"] ?>&w=215&h=154" border="0" />
                        </a>
                        <p>
                            <a id="<?= $l['id_foto'] ?>" data-capa="<?= $l["arquivo_foto"] ?>" data-id-produto="<?= $l["id_produto"] ?>" data-foto="<?=SITEURL?>php/class/class.Thumb.php?src=<?= DIR_MODS_PRODUTOS_URL . $l["arquivo_foto"] ?>&w=215&h=154" class="abreModalExcluiFotoProduto ls-btn" href="javascript:void(0);" title="Excluir foto"><i class="ls-ico-remove"></i> Excluir</a>
                        </p>
                    </div>
                </div>
            <? 
                $i++; 
            } 
        ?>
    </div>
    </fieldset>
<? } ?>
<div class="ls-clearfix"></div>
<br><br>

