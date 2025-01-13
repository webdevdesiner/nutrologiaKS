$(function () {
    $("input#busca").on('keydown', function(e) {
        var keyCode = (window.event) ? e.which : e.keyCode;

        if (keyCode == 13){
            e.preventDefault();
            $("#buscar").focus();
        }
    });

    $("#buscar").on('click', function () {
        var url = SITEURL;
        var busca       = $('#busca').val();
        var pg          = getURLParameter('pg');  // ?pg=
        var ipp         = getURLParameter('ipp'); // &ipp=
        
        url = ((url.length-1) == url.lastIndexOf("/")) ? url : url+"/";

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
        var url         = SITEURL;
        var ipp         = $("option:selected", this).val();
        var pg          = getURLParameter('pg');	 // ?pg=
        var busca       = getURLParameter('busca');

        url = ((url.length-1) == url.lastIndexOf("/")) ? url : url+"/";

        var newUrl = url + 'gerenciador.php?pg=' + pg + '&ipp=' + ipp;

        if (busca != null) {
            newUrl += '&busca=' + busca;
        }

        $(location).attr('href', newUrl);
    });

    $(".ls-pagination li").on("click", "a", function () {
        var url         = $(this).attr("href");
        var busca       = getURLParameter('busca');
        var pg          = getURLParameter('pg');  // ?pg=
        var ipp         = getURLParameter('ipp'); // &ipp=

        var newUrl      = url;

        if (ipp != null) {
            newUrl += '&ipp=' + ipp;
        }

        if (busca != null) {
            newUrl += '&busca=' + busca;
        }

        $(location).attr('href', newUrl);
        return false;
    });

    var $modalExcluiUsuario = $("#modalExcluiUsuario");
    $(".abreModalExcluirUsuario").click(function(){
        var idUsuario   = $(this).attr('id'),
            nomeUsuario = $(this).attr('rel'),
            parent      = $(this).closest('tr');
        $modalExcluiUsuario.find("#idUsuario").val( idUsuario );
        $modalExcluiUsuario.find("#nomeUsuario").html(nomeUsuario);
        $modalExcluiUsuario.data("parent", parent);
        locastyle.modal.open("#modalExcluiUsuario");
    });

    $modalExcluiUsuario.find("#btnExcluir").on('click', function () {
        var idUsuario   = $modalExcluiUsuario.find("#idUsuario").val();
        var parent      = $modalExcluiUsuario.data("parent");
        $.ajax({
            type: 'post',
            url: "usuarios_acoes.php",
            data: 'delUsuario=' + idUsuario,
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
                    redirectPage('usuarios_ger', 0);
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
