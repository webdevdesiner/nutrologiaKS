<form action="" class="ls-form ls-form-horizontal row" id="form_produto" name="form_produto">
    <input type="hidden" id="acao" name="acao" value="addProduto">
    <fieldset>
        <label class="ls-label col-md-6">
            <b class="ls-label-text">Nome:*</b>
            <input type="text" id="nomeProduto" name="nomeProduto" value="" required>
        </label>
        <label class="ls-label col-md-3">
            <b class="ls-label-text">Categoria:*</b>
            <div class="ls-custom-select">
                <select class="ls-select" name="IDCategoriaProduto" id="IDCategoriaProduto" required>
                    <option value="">**Selecione</option>
                    <?php
                    $sth = func_pdo_select($con, "wd_categorias", "id_categoria, nome_categoria", "", "", "nome_categoria");
                    while($l = $sth->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <option value="<?=$l['id_categoria']?>"><?=$l['nome_categoria']?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </label>
        <label class="ls-label col-md-3">
            <b class="ls-label-text">Quantidade:*</b>
            <input type="text" name="quantidadeProduto" id="quantidadeProduto" required>
        </label>
    </fieldset>
    <fieldset>
        <label class="ls-label col-md-12">
            <b class="ls-label-text">Benefícios:</b>
            <textarea id="descricaoProduto" name="descricaoProduto" class="ls-textarea-resize-both"></textarea>
        </label>
    </fieldset>
    <fieldset>
        <label class="ls-label col-md-5">
            <b class="ls-label-text">Destaque:</b>
            <input type="radio" name="destaqueProduto" value="sim"> Sim
            <input type="radio" name="destaqueProduto" value="nao" checked="checked"> Não
        </label>

        <label for="html5fileupload" class="ls-label col-md-12">
            <b class="ls-label-text">Foto do produto (*.jpg, *.jpeg, *.png, *.gif)</b>
            <div class="html5fileupload multi"
                 data-multiple="false"
                 data-form="true"
                 data-edit="false"
                 data-radio="false"
                 data-max-filesize="<?= $tamanhoArquivo ?>"
                 data-allstart="false"
                 data-restart="false"
                 data-valid-mime="image.*"
                 style="width: 100%;">
                <input type="file" name="file[]" />
            </div>
        </label>
    </fieldset>
    <div class="ls-actions-btn ls-no-border-top ls-no-padding-top">
        <button type="submit" class="ls-btn-primary ls-ico-checkmark ls-no-margin-top" name="salvar">SALVAR</button>
        <a href="?pg=produtos" class="ls-btn ls-no-margin-top">Cancelar</a>
    </div>
</form>
<br><br>
<script type="text/javascript">
    var editor = CKEDITOR.replace('descricaoProduto', { customConfig: 'config.js' });
</script>