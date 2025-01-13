<?php
    require_once BASEPATH . DIRECTORY_SEPARATOR . "seguranca.php";

    $acao       = isset($_GET['acao']) ? sanitize($_GET['acao']) : "";
    $busca      = isset($_GET['busca']) ? sanitize($_GET['busca']) : "";
    $data_ini   = isset($_GET['data_ini']) ? sanitize($_GET['data_ini']) : "";
    $data_fim   = isset($_GET['data_fim']) ? sanitize($_GET['data_fim']) : "";
    $ativo      = isset($_GET['ativo']) ? sanitize($_GET['ativo']) : "";

    switch ($acao){
        case "add":
            $texto = "<span class=\"ls-tag\">Cadastro</span>";
            break;
        case "edt":
            $texto = "<span class=\"ls-tag\">Alteração</span>";
            break;
        default:
            $texto = "";
            break;
    }
?>
<h1 class="ls-title-intro ls-ico-blank">Vídeos <?=$texto?></h1>
<?php switch ($acao): case "add": ?>
    <?php require 'videos_add.php'; ?>
    <?php break; ?>

    <?php case "edt": ?>
        <?php require 'videos_edt.php'; ?>
    <?php break; ?>

    <?php default: ?>
    <?php if ($acao == ''){ ?>
        <?php $cadastrados  = func_pdo_count($con, "wd_videos"); ?>
        <div class="row">
            <div class="col-md-6">
                <a class="ls-btn-primary ls-ico-plus" href="?pg=videos&acao=add"> NOVO VÍDEO</a>
            </div>
            <div class="col-md-6 ls-txt-right">
                <p style="margin-top: 10px;">Total cadastrado: <strong><?=$cadastrados?></strong></p>
            </div>
        </div>

        <fieldset class="ls-box-filter">
            <form action="" name="form_filtros" method="post" class="ls-form ls-form-inline" data-ls-module="form">
                <label class="ls-label col-md-3">
                    <input type="text" name="busca" id="busca" value="<?=$busca?>" placeholder="busque por título ou descrição" />
                </label>
                <label class="ls-label col-md-2">
                    <div class="ls-prefix-group">
                        <input type="text" name="data_ini" class="datepicker ls-daterange ls-mask-date" placeholder="data inicial" id="data_ini" data-ls-daterange="#data_fim" value="<?=$data_ini?>">
                        <a class="ls-label-text-prefix ls-ico-calendar" data-trigger-calendar="#data_ini" href="#"></a>
                    </div>
                </label>

                <label class="ls-label col-md-2">
                    <div class="ls-prefix-group">
                        <input type="text" name="data_fim" class="datepicker ls-daterange ls-mask-date" placeholder="data final" id="data_fim" value="<?=$data_fim?>" disabled>
                        <a class="ls-label-text-prefix ls-ico-calendar" data-trigger-calendar="#data_fim" href="#"></a>
                    </div>
                </label>
                <label class="ls-label col-md-2">
                    <div class="ls-custom-select ls-field-md">
                        <select name="ativo" id="ativo" class="ls-select">
                            <option value="" selected>**Ativo</option>
                            <option value="1" <? if ($ativo == 1) echo 'selected="selected"'; ?> >Sim</option>
                            <option value="2" <? if ($ativo == 2) echo 'selected="selected"'; ?> >Não</option>
                        </select>
                    </div>
                </label>

                <button type="button" class="ls-btn ls-ico-search" id="btnBuscar">Buscar</button>
                <a href="?pg=videos" class="ls-btn-danger ls-no-margin-top">Limpar</a>
            </form>
        </fieldset>
    <?php } ?>
    <?php if ($cadastrados == 0 && $acao == ''){ ?>
        <div class='ls-alert-info'><strong>Aviso!</strong> Nenhum vídeo cadastrado no momento.</div>
    <?php }else{ ?>
        <?php
        // itens por página
        $ipp = $itensPorPagina;
        if($_GET && isset($_GET['ipp'])) $ipp = (int) $_GET['ipp'];
        $indice = isset($_GET["ind"]) ? $_GET["ind"] : 1;
        $inicio = ($indice * $ipp) - $ipp;
        //
        require 'videos_cons.php';
        ?>
    <?php } ?>
    <?php break; ?>

<?php endswitch; ?>

<div id="modalExcluiVideo" class="ls-modal">
    <div class="ls-modal-box">
        <div class="ls-modal-header">
            <button data-dismiss="modal">×</button>
            <h4 class="ls-modal-title">Você tem certeza que deseja excluir este registro?</h4>
        </div>
        <div class="ls-modal-body">
            <input type="hidden" name="idVideo" id="idVideo" value="">
            <p id="nomeVideo"></p>
        </div>
        <div class="ls-modal-footer ls-full-width ls-txt-right">
            <a data-dismiss="modal" class="ls-btn ls-ico-close" href="javascript:void(0)">Cancelar</a>
            <button class="ls-btn-primary ls-ico-remove" id="btnExcluir">Excluir</button>
        </div>
    </div>
</div>

<div id="modalExcluiFotoVideo" class="ls-modal">
    <div class="ls-modal-box">
        <div class="ls-modal-header">
            <button data-dismiss="modal">×</button>
            <h4 class="ls-modal-title">Você tem certeza que deseja excluir esta foto?</h4>
        </div>
        <div class="ls-modal-body">
            <div class="center padd-top-20">
                <img id="foto" src="" border="0"/>
            </div>
            <input type="hidden" name="idFotoVideo" id="idFotoVideo" value="">
            <input type="hidden" name="idVideo" id="idVideo" value="">
            <input type="hidden" name="capaVideo" id="capaVideo" value="">
        </div>
        <div class="ls-modal-footer ls-full-width ls-txt-right">
            <a data-dismiss="modal" class="ls-btn ls-ico-close" href="javascript:void(0)">Cancelar</a>
            <button class="ls-btn-primary ls-ico-remove" id="btnExcluir">Excluir</button>
        </div>
    </div>
</div>

<div id="modalAdicionaFotoVideo" class="ls-modal">
    <div class="ls-modal-box">
        <div class="ls-modal-header">
            <button data-dismiss="modal">×</button>
            <h4 class="ls-modal-title">Adicionar foto</h4>
        </div>
        <div class="ls-modal-body">
            <form action="" class="ls-form row" id="form_adiciona_foto" name="form_adiciona_foto">
                <input type="hidden" id="acao" name="acao" value="addFotoVideo">
                <input type="hidden" id="idVideo" name="idVideo" value="<?=intval($_GET['id'])?>">
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

<script type="text/javascript">
    $(function () {
        /*-------------------------------------------------
        / AJAX ADICIONA VIDEO
        /------------------------------------------------*/
        var enviando_formulario = false;
        $('#form_video').submit(function () {
            var btn = document.activeElement.id;

            var obj = this;
            var submit_btn = $('#form_video :submit');
            var submit_btn_text = submit_btn.html();
            var dados = new FormData(obj);

            // ckeditor
            var editorData = editor.getData();
            var postBody = editorData.replace(/&nbsp;/gi, ' ');

            dados.append('descricaoVideo', postBody);

            function volta_submit() {
                submit_btn.prop('disabled', false);
                submit_btn.html(submit_btn_text);
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
                        submit_btn.html('SALVANDO...');

                        $("#container_fluid").hide();
                        $("#proc_loader").show();

                    },
                    url: "modulos/videos/videos_acoes.php",
                    type: "POST",
                    data: dados,
                    dataType: "json",
                    processData: false,
                    cache: false,
                    contentType: false,
                    success: function (json) {

                        var $modalMensagem = $("#modalMensagem");

                        if (json.status == 1 || json.status == 3) {//ok

                            $modalMensagem.find("#modal-title").html(json.titulo);
                            $modalMensagem.find("#modal-body").html(json.msg);
                            locastyle.modal.open("#modalMensagem");

                            $('body').on('modal:closed', '.ls-modal', function () {
                                if (btn == "btn1") {
                                    redirectPage('videos', 0);
                                }else{
                                    reloadPage2();
                                }
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
                        alert(request.responseText);
                    }
                });
            }
            return false;
        });

        /*-------------------------------------------------
        / FILTROS
        /------------------------------------------------*/
        $("input#busca").on('keydown', function (e) {
            var keyCode = (window.event) ? e.which : e.keyCode;

            if (keyCode == 13) {
                e.preventDefault();
                $("#btnBuscar").focus();
            }
        });

        $("#btnBuscar").on('click', function () {
            var url         = SITEURL;
            var busca       = $('#busca').val();
            var data_ini    = $('#data_ini').val();
            var data_fim    = $('#data_fim').val();
            var ativo    = $("#ativo option:selected").val();
            var pg          = getURLParameter('pg');
            var ipp         = getURLParameter('ipp');

            url = ((url.length-1) == url.lastIndexOf("/")) ? url : url+"/";

            var newUrl = url + 'gerenciador.php?pg=' + pg;

            if (ipp != null) { newUrl += '&ipp=' + ipp; }
            if (busca != "") { newUrl += '&busca=' + busca; }
            if (data_ini != "") { newUrl += '&data_ini=' + data_ini; }
            if (data_fim != "") { newUrl += '&data_fim=' + data_fim; }
            if (ativo != "") { newUrl += '&ativo=' + ativo; }
            $(location).attr('href', newUrl);
        });


        $('#itensPorPagina').change(function () {
            var url         = SITEURL;
            var ipp         = $("option:selected", this).val();
            var pg          = getURLParameter('pg');
            var busca       = getURLParameter('busca');
            var data_ini    = getURLParameter('data_ini');
            var data_fim    = getURLParameter('data_fim');
            var ativo       = getURLParameter('ativo');

            url = ((url.length-1) == url.lastIndexOf("/")) ? url : url+"/";

            var newUrl = url + 'gerenciador.php?pg=' + pg + '&ipp=' + ipp;

            if (busca != null) { newUrl += '&busca=' + busca; }
            if (data_ini != null) { newUrl += '&data_ini=' + data_ini; }
            if (data_fim != null) { newUrl += '&data_fim=' + data_fim; }
            if (ativo != null) { newUrl += '&ativo=' + ativo; }
            $(location).attr('href', newUrl);
        });

        $(".ls-pagination li").on("click", "a", function () {
            var url         = $(this).attr("href");
            var busca       = getURLParameter('busca');
            var data_ini    = getURLParameter('data_ini');
            var data_fim    = getURLParameter('data_fim');
            var ativo    = getURLParameter('ativo');
            var pg          = getURLParameter('pg');
            var ipp         = getURLParameter('ipp');

            var newUrl = url;

            if (ipp != null) { newUrl += '&ipp=' + ipp; }
            if (busca != null) { newUrl += '&busca=' + busca; }
            if (data_ini != null) { newUrl += '&data_ini=' + data_ini; }
            if (data_fim != null) { newUrl += '&data_fim=' + data_fim; }
            if (ativo != null) { newUrl += '&ativo=' + ativo; }
            $(location).attr('href', newUrl);
            return false;
        });

        $('#data_ini').on("change", function () {
            if ($(this).val())
                $("#data_fim").prop("disabled", false);
            else
                $("#data_fim").prop("disabled", true);
        });

        /*-------------------------------------------------
        / AJAX EXCLUI VIDEO
        /------------------------------------------------*/
        var $modalExcluiVideo = $("#modalExcluiVideo");
        $(".abreModalExcluirVideo").click(function () {
            var idVideo = $(this).attr('id'),
                nomeVideo = $(this).data('nome'),
                parent = $(this).closest('tr');
            $modalExcluiVideo.find("#idVideo").val(idVideo);
            $modalExcluiVideo.find("#nomeVideo").html(nomeVideo);
            $modalExcluiVideo.data("parent", parent);
            locastyle.modal.open("#modalExcluiVideo");
        });

        $modalExcluiVideo.find("#btnExcluir").on('click', function () {
            var idVideo = $modalExcluiVideo.find("#idVideo").val();
            var parent = $modalExcluiVideo.data("parent");
            $.ajax({
                type: 'post',
                url: "modulos/videos/videos_acoes.php",
                data: {
                    acao : 'delVideo',
                    idVideo : idVideo
                },
                dataType: "json",
                beforeSend: function () {
                    parent.animate({
                        'backgroundColor': '#FF0000'
                    }, 400);
                }
            }).done(function (json) {

                var $modalMensagem = $("#modalMensagem");

                if (json.status == 1) {//ok

                    $modalMensagem.find("#modal-title").html(json.titulo);
                    $modalMensagem.find("#modal-body").html(json.msg);
                    locastyle.modal.open("#modalMensagem");

                    parent.fadeOut(400, function () {
                        parent.remove();
                    });

                    $('body').on('modal:closed', '.ls-modal', function () {
                        redirectPage('videos', 0);
                    });

                } else {//erro

                    $modalMensagem.find("#modal-title").html(json.titulo);
                    $modalMensagem.find("#modal-body").html(json.msg);
                    locastyle.modal.open("#modalMensagem");

                }
            });
            locastyle.modal.close();
        });

        /*-------------------------------------------------
        / AJAX EXCLUI FOTO VIDEO
        /------------------------------------------------*/
        var $modalExcluiFotoVideo = $("#modalExcluiFotoVideo");
        $(".abreModalExcluiFotoVideo").click(function () {
            var idFotoVideo = $(this).attr('id'),
                capa = $(this).data('capa'),
                idVideo = $(this).data('id-produto'),
                foto = $(this).data("foto"),
                parent = $(this).parent().parent();
            $modalExcluiFotoVideo.find("#idFotoVideo").val(idFotoVideo);
            $modalExcluiFotoVideo.find("#idVideo").val(idVideo);
            $modalExcluiFotoVideo.find("#capaVideo").val(capa);
            $modalExcluiFotoVideo.find("#foto").attr("src", foto);
            $modalExcluiFotoVideo.data("parent", parent);
            locastyle.modal.open("#modalExcluiFotoVideo");
        });

        $modalExcluiFotoVideo.find("#btnExcluir").on('click', function () {
            var idFotoVideo = $modalExcluiFotoVideo.find("#idFotoVideo").val();
            var idVideo = $modalExcluiFotoVideo.find("#idVideo").val();
            var capaVideo = $modalExcluiFotoVideo.find("#capaVideo").val();
            var parent = $modalExcluiFotoVideo.data("parent");
            var dados = new FormData();
            dados.append('acao', 'delFotoVideo');
            dados.append('idFotoVideo', idFotoVideo);
            dados.append('idVideo', idVideo);
            dados.append('capaVideo', capaVideo);

            $.ajax({
                type: 'post',
                url: "modulos/videos/videos_acoes.php",
                data: dados,
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
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

        /*-------------------------------------------------
        / MODAL ADICIONA FOTO VIDEO
        /------------------------------------------------*/
        var $modalAdicionaFotoVideo = $("#modalAdicionaFotoVideo");
        $(".abreModalAdicionaFotoVideo").click(function () {
            locastyle.modal.open("#modalAdicionaFotoVideo");
        });

        var enviando_form_foto = false;
        $modalAdicionaFotoVideo.find('#form_adiciona_foto').submit(function () {
            var obj = this;
            var submit_btn = $('#form_adiciona_foto :submit');
            var submit_btn_text = submit_btn.val();
            var dados = new FormData(obj);

            function volta_submit() {
                submit_btn.prop('disabled', false);
                submit_btn.val(submit_btn_text);
                enviando_form_foto = false;
            }
            if (!enviando_form_foto) {
                $.ajax({
                    beforeSend: function () {
                        // Configura a variável enviando
                        enviando_form_foto = true;
                        // Adiciona o atributo desabilitado no botão
                        submit_btn.prop('disabled', true);
                        // Modifica o texto do botão
                        submit_btn.val('SALVANDO...');

                        $("#container_fluid").hide();
                        $("#proc_loader").show();

                    },
                    url: "modulos/videos/videos_acoes.php",
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
                                reloadPage();
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
        / AUTO BUSCA
        /------------------------------------------------*/
        $('.select2').select2({
            language: "pt-BR",
            theme: "bootstrap",
            placeholder: "**Selecione",
            allowClear: true
        });

        $(".btnBuscarDados").click(function () {
            var url = $("#youtubeVideo").val();
            $.getJSON("modulos/videos/videos_acoes.php", {'acao':'dadosVideo', 'url':url}, function (data) {
                $("#tituloVideo").val(data.titulo);
                $("#capaVideo").val(data.capa).next().find("a").attr("href", data.capa);
                $("#duracaoVideo").val(data.duracao);
                editor.setData(data.descricao);
            });
            return false;
        });

    });
</script>