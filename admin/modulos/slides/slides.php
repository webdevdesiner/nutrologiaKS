<?php
	require_once BASEPATH . DIRECTORY_SEPARATOR . "seguranca.php";
    // total cadastrados
    $total  = func_pdo_count($con, "wd_slides");
?>
<h1 class="ls-title-intro ls-ico-images">Slides</h1>
<div class="row">
    <div class="col-md-6">
        <a class="ls-btn-primary ls-ico-plus abreModalAdicionaSlide" href="#"> NOVO SLIDE</a>
    </div>
    <div class="col-md-6 ls-txt-right">
        <p style="margin-top: 10px;">Total cadastrado: <strong><?=$total?></strong></p>
    </div>
</div>

<?php if ($total == 0){ ?>
    <br><div class='ls-alert-info'><strong>Aviso!</strong> Nenhum slide cadastrado no momento.</div>
<?php
} else {
    $colunas = 4;
    if ($total > 0) {
        $sql = "SELECT id_slide, arquivo_slide FROM wd_slides";

        try {
            $res = $con->query($sql);
        } catch (PDOException $ex) {
            $json['status'] = 2;
            $json['titulo'] = 'Ocorreu um problema!';
            $json['msg'] = '<p> No momento não foi possível exibir o(s) slide(s).</p>';
        }

        $i = 0;
        ?>
        <fieldset class="ls-box-filter">
        <div>
            <?
            while ($l = $res->fetch(PDO::FETCH_ASSOC)){
                if( (($i % $colunas) == 0) && ($i != 0) ){
                    echo "</div><div>";
                }
                ?>
                <div class="col-md-3 ls-no-padding">

                    <div class="images">
                        <a href="<?= DIR_MODS_SLIDES_URL . $l['arquivo_slide'] ?>" class="clbxSlide">
                            <img src="<?= DIR_MODS_SLIDES_URL . $l["arquivo_slide"] ?>" border="0" class="img-responsive" />
                        </a>
                        <p>
                            <a id="<?= $l['id_slide'] ?>" data-arquivo="<?= $l["arquivo_slide"] ?>" data-mini="<?=SITEURL?>php/class/class.Thumb.php?src=<?= DIR_MODS_SLIDES_URL . $l["arquivo_slide"] ?>&w=320&h=148" class="abreModalExcluiSlide ls-btn" href="javascript:void(0);" title="Excluir foto"><i class="ls-ico-remove"></i> Excluir</a>
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
<? } ?>

<div id="modalAdicionaSlide" class="ls-modal">
    <div class="ls-modal-box">
        <div class="ls-modal-header">
            <button data-dismiss="modal">×</button>
            <h4 class="ls-modal-title">Novo slide</h4>
        </div>
        <div class="ls-modal-body">
            <p>Tamanho ideal: 900 x 416px</p>
            <form action="" class="ls-form row" id="form_slide" name="form_slide">
                <input type="hidden" id="acao" name="acao" value="addSlide">
                <fieldset>
                    <label for="html5fileupload" class="ls-label col-md-12">
                        <div class="html5fileupload multi"
                             data-multiple="true"
                             data-form="true"
                             data-edit="false"
                             data-max-filesize="<?=$tamanhoArquivo?>"
                             data-radio="false"
                             data-allstart="false"
                             data-restart="false"
                             data-valid-mime="image.*"
                             style="width: 100%;">
                            <input type="file" name="file[]"/>
                        </div>

                        <script type="text/javascript">
                            $('.html5fileupload.multi').html5fileupload();
                        </script>
                    </label>
                </fieldset>
                <div class="ls-actions-btn ls-no-border-top ls-no-padding-top ls-no-padding-bottom">
                    <button type="submit" class="ls-btn-primary ls-ico-checkmark ls-no-margin-top" name="salvar">SALVAR</button>
                    <a data-dismiss="modal" class="ls-btn" href="javascript:void(0)">CANCELAR</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modalExcluiSlide" class="ls-modal">
    <div class="ls-modal-box">
        <div class="ls-modal-header">
            <button data-dismiss="modal">×</button>
            <h4 class="ls-modal-title">Você tem certeza que deseja excluir este registro?</h4>
        </div>
        <div class="ls-modal-body">
            <div class="center padd-top-20">
                <img id="mini" src="" border="0"/>
            </div>
            <input type="hidden" name="idSlide" id="idSlide" value="">
            <input type="hidden" name="arquivo" id="arquivo" value="">
        </div>
        <div class="ls-modal-footer ls-full-width ls-txt-right">
            <a data-dismiss="modal" class="ls-btn ls-ico-close" href="javascript:void(0)">Cancelar</a>
            <button class="ls-btn-primary ls-ico-remove" id="btnExcluir">Excluir</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        /*-------------------------------------------------
        / MODAL ADICIONA SLIDE
        /------------------------------------------------*/
        var $modalAdicionaSlide = $("#modalAdicionaSlide");
        $(".abreModalAdicionaSlide").click(function () {
            locastyle.modal.open("#modalAdicionaSlide");
        });

        var enviando_formulario = false;
        $modalAdicionaSlide.find('#form_slide').submit(function () {
            var obj = this;
            var submit_btn = $('#form_slide :submit');
            var submit_btn_text = submit_btn.val();
            var dados = new FormData(obj);

            function volta_submit() {
                submit_btn.prop('disabled', false);
                submit_btn.val(submit_btn_text);
                enviando_formulario = false;
            }
            if (!enviando_formulario) {
                $.ajax({
                    beforeSend: function () {
                        // Configura a variável enviando
                        enviando_formulario = true;
                        // Adiciona o atributo desabilitado no botão
                        submit_btn.prop('disabled', true);
                        // Modifica o texto do botão
                        submit_btn.val('SALVANDO...');

                        $("#container_fluid").hide();
                        $("#proc_loader").show();

                    },
                    url: "modulos/slides/slides_acoes.php",
                    type: "POST",
                    data: dados,
                    dataType: "json",
                    processData: false,
                    cache: false,
                    contentType: false,
                    success: function (json) {

                        var $modalMensagem = $("#modalMensagem");

                        if (json.status == 1) {//ok

                            $modalMensagem.find("#modal-title").html(json.titulo);
                            $modalMensagem.find("#modal-body").html(json.msg);
                            locastyle.modal.open("#modalMensagem");

                            $('body').on('modal:closed', '.ls-modal', function () {
                                redirectPage('slides', 0);
                            });

                        } else {//erro

                            volta_submit();
                            $("#container_fluid").show();
                            $("#proc_loader").hide();

                            $modalMensagem.find("#modal-title").html(json.titulo);
                            $modalMensagem.find("#modal-body").html(json.msg);
                            locastyle.modal.open("#modalMensagem");

                        }
                    },
                    error: function (request, status, error) {
                        volta_submit();
                        alert(request.responseText, status, error);
                    }
                });
            }
            return false;
        });

        /*-------------------------------------------------
        / MODAL EXCLUI SLIDE
        /------------------------------------------------*/
        var $modalExcluiSlide = $("#modalExcluiSlide");
        $(".abreModalExcluiSlide").click(function(){
            var idSlide		= $(this).attr('id'),
                mini        = $(this).data("mini"),
                arquivo     = $(this).data("arquivo"),
                parent      = $(this).closest('div').parent();

            $modalExcluiSlide.find("#idSlide").val( idSlide );
            $modalExcluiSlide.find("#arquivo").val( arquivo );
            $modalExcluiSlide.find("#mini").attr("src", mini);
            $modalExcluiSlide.data("parent", parent);
            locastyle.modal.open("#modalExcluiSlide");
        });

        $modalExcluiSlide.find("#btnExcluir").on('click', function(){
            var idSlide     = $modalExcluiSlide.find("#idSlide").val();
            var arquivo     = $modalExcluiSlide.find("#arquivo").val();
            var parent      = $modalExcluiSlide.data("parent");

            $.ajax({
                type: 'post',
                url: "modulos/slides/slides_acoes.php",
                data: {
                    acao : 'delSlide',
                    idSlide : idSlide,
                    arquivo : arquivo
                },
                dataType: "json",
                beforeSend: function () {
                    parent.fadeOut(400, function () {
                        parent.remove();
                    });
                }
            }).done(function (json) {
                var $modalMensagem = $("#modalMensagem");

                if (json.status == 1) {//ok

                    $modalMensagem.find("#modal-title").html(json.titulo);
                    $modalMensagem.find("#modal-body").html(json.msg);
                    locastyle.modal.open("#modalMensagem");

                    $('body').on('modal:closed', '.ls-modal', function () {
                        reloadPage();
                    });
                }
                else {//erro

                    $modalMensagem.find("#modal-title").html(json.titulo);
                    $modalMensagem.find("#modal-body").html(json.msg);
                    locastyle.modal.open("#modalMensagem");
                }
            });
            locastyle.modal.close();
        });

        // efeito colorbox
        $(".clbxSlide").colorbox({rel:"fotos"});

    });
</script>