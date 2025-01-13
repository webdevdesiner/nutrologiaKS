<?php
    require_once BASEPATH . DIRECTORY_SEPARATOR . "seguranca.php";
    
    $acao       = isset($_GET['acao']) ? sanitize($_GET['acao']) : "";
    $busca      = isset($_GET['busca']) ? sanitize($_GET['busca']) : "";

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
<h1 class="ls-title-intro ls-ico-list">Categorias <?=$texto?></h1>
<?php switch ($acao): case 'add': ?>
        <?php require 'categorias_add.php'; ?>
    <?php break; ?>

    <?php case "edt": ?>
        <?php require 'categorias_edt.php'; ?>
    <?php break; ?>

    <?php default: ?>
    <?php if ($acao == ''){ ?>
        <?php $cadastrados  = func_pdo_count($con, "wd_categorias"); ?>
        <div class="row">
            <div class="col-md-6">
                <a class="ls-btn-primary ls-ico-plus" href="?pg=categorias&acao=add"> NOVA CATEGORIA</a>
            </div>
            <div class="col-md-6 ls-txt-right">
                <p style="margin-top: 10px;">Total cadastrado: <strong><?=$cadastrados?></strong></p>
            </div>
        </div>

        <fieldset class="ls-box-filter">
            <form action="" name="form_filtros" method="post" class="ls-form ls-form-inline" data-ls-module="form">
                <label class="ls-label col-md-6">
                    <input type="text" name="busca" id="busca" value="<?=$busca?>" placeholder="busque por nome" />
                </label>

                <button type="button" class="ls-btn ls-ico-search" id="btnBuscar">Buscar</button>
                <a href="?pg=categorias" class="ls-btn-danger ls-no-margin-top">Limpar</a>
            </form>
        </fieldset>
    <?php } ?>
    <?php if ($cadastrados == 0 && $acao == ''){ ?>
        <div class='ls-alert-info'><strong>Aviso!</strong> Nenhuma categoria cadastrada no momento.</div>
    <?php }else{ ?>
        <?php
        // itens por página
        $ipp = $itensPorPagina;
        if($_GET && isset($_GET['ipp'])) $ipp = (int) $_GET['ipp'];
        $indice = isset($_GET["ind"]) ? $_GET["ind"] : 1;
        $inicio = ($indice * $ipp) - $ipp;
         //
         require 'categorias_cons.php';
         ?>
         <?php } ?>
    <?php break; ?>

<?php endswitch; ?>

<div id="modalExcluiCategoria" class="ls-modal">
    <div class="ls-modal-box">
        <div class="ls-modal-header">
            <button data-dismiss="modal">×</button>
            <h4 class="ls-modal-title">Você tem certeza que deseja excluir este registro?</h4>
        </div>
        <div class="ls-modal-body">
            <input type="hidden" name="idCategoria" id="idCategoria" value="">
            <p id="nomeCategoria"></p>
        </div>
        <div class="ls-modal-footer ls-full-width ls-txt-right">
            <a data-dismiss="modal" class="ls-btn ls-ico-close" href="javascript:void(0)">Cancelar</a>
            <button class="ls-btn-primary ls-ico-remove" id="btnExcluir">Excluir</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        /*-------------------------------------------------
        / AJAX ADICIONA CATEGORIA
        /------------------------------------------------*/
        var enviando_formulario = false;
        $('#form_categoria').submit(function () {
            var obj = this;
            var submit_btn = $('#form_categoria :submit');
            var submit_btn_text = submit_btn.html();
            var dados = new FormData(obj);

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
                    url: "modulos/categorias/categorias_acoes.php",
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
                                redirectPage('categorias', 0);
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
            var url     = SITEURL;
            var busca   = $('#busca').val();
            var pg      = getURLParameter('pg');
            var ipp     = getURLParameter('ipp');

            url = ((url.length - 1) == url.lastIndexOf("/")) ? url : url + "/";

            var newUrl = url + 'gerenciador.php?pg=' + pg;

            if (ipp != null) {
                newUrl += '&ipp=' + ipp;
            }
            if (busca != "") {
                newUrl += '&busca=' + busca;
            }
            $(location).attr('href', newUrl);
        });

        $('#itensPorPagina').change(function () {
            var url = SITEURL;
            var ipp = $("option:selected", this).val();
            var pg = getURLParameter('pg');
            var busca = getURLParameter('busca');

            url = ((url.length - 1) == url.lastIndexOf("/")) ? url : url + "/";

            var newUrl = url + 'gerenciador.php?pg=' + pg + '&ipp=' + ipp;
            if (busca != null) {
                newUrl += '&busca=' + busca;
            }
            $(location).attr('href', newUrl);
        });

        $(".ls-pagination li").on("click", "a", function () {
            var url = $(this).attr("href");
            var busca = getURLParameter('busca');
            var pg = getURLParameter('pg');
            var ipp = getURLParameter('ipp');

            var newUrl = url;

            if (ipp != null) {
                newUrl += '&ipp=' + ipp;
            }
            if (busca != null) {
                newUrl += '&busca=' + busca;
            }
            $(location).attr('href', newUrl);
            return false;
        });

        /*-------------------------------------------------
        / MODAL EXCLUI CATEGORIA
        /------------------------------------------------*/
        var $modalExcluiCategoria = $("#modalExcluiCategoria");
        $(".abreModalExcluirCategoria").click(function () {
            var idCategoria = $(this).attr('id'),
                nomeCategoria = $(this).data('nome'),
                parent = $(this).closest('tr');

            $modalExcluiCategoria.find("#idCategoria").val(idCategoria);
            $modalExcluiCategoria.find("#nomeCategoria").html(nomeCategoria);
            $modalExcluiCategoria.data("parent", parent);
            locastyle.modal.open("#modalExcluiCategoria");
        });

        $modalExcluiCategoria.find("#btnExcluir").on('click', function () {
            var idCategoria = $modalExcluiCategoria.find("#idCategoria").val();
            var parent = $modalExcluiCategoria.data("parent");
            $.ajax({
                type: 'post',
                url: "modulos/categorias/categorias_acoes.php",
                data: {
                    acao : 'delCategoria',
                    idCategoria : idCategoria
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
                        reloadPage();
                    });

                } else {//erro

                    $modalMensagem.find("#modal-title").html(json.titulo);
                    $modalMensagem.find("#modal-body").html(json.msg);
                    locastyle.modal.open("#modalMensagem");

                }
            });
            locastyle.modal.close();
        });
    });
</script>