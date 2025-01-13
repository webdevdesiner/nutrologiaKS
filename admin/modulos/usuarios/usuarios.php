<?php
require_once BASEPATH . DIRECTORY_SEPARATOR . "seguranca.php";

$acao       = isset($_GET['acao']) ? sanitize($_GET['acao']) : "";

switch ($acao){
    case "pass":
        $texto = "<span class=\"ls-tag\">Alteração de Senha</span>";
        break;
    default:
        $texto = "";
        break;
}
?>
<h1 class="ls-title-intro ls-ico-users">Usuários <?=$texto?></h1>

<?php
    require 'usuarios_pass.php';
?>

<script type="text/javascript">
    $(function () {
        /*-------------------------------------------------
        / AJAX ALTERA SENHA
        /------------------------------------------------*/
        var enviando_formulario = false;
        $('#form_pass').submit(function () {
            var obj = this;
            var submit_btn = $('#form_pass :submit');
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
                    url: "modulos/usuarios/usuarios_acoes.php",
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
                        alert(request.responseText);
                    }
                });
            }
            return false;
        });
    });
</script>

