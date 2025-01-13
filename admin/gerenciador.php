<?php
    require_once "seguranca.php";
    require_once("php/config.php");

    $nomeUsuario = current(explode(" ", $_SESSION["apps_20032019"]["nomeUsuario"]));
?>
<!DOCTYPE html>
<html class="<?=$corSistema?>">
<head>
    <title><?=$nomeSistema ." - ". $nomeEmpresa?></title>

    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="<?=$nomeSistema?>">

    <!-- ** css ** -->
    <!-- font-awesome -->
    <link href="bibliotecas/font-awesome/font-awesome.min.css" rel="stylesheet">
    <!-- locastyle -->
    <link href="bibliotecas/locastyle/locastyle.css" rel="stylesheet" type="text/css">
    <!-- bootstrap -->
    <link href="css/bootstrap-table.css" rel="stylesheet" type="text/css">
    <!-- upload -->
    <link href="bibliotecas/html5fileupload/html5fileupload.css?v1.0" rel="stylesheet">
    <!-- select2 -->
    <link href="bibliotecas/select2/select2.min.css" rel="stylesheet">
    <link href="bibliotecas/select2/theme/select2-bootstrap.css" rel="stylesheet">
    <!-- gerenciador -->
    <link href="css/gerenciador.css" rel="stylesheet" type="text/css">
    <!-- colorbox -->
    <link href="bibliotecas/colorbox/colorbox.css" rel="stylesheet" type="text/css" />
    <!-- ** css ** -->

    <!-- ** javascripts **  -->
    <!-- jquery -->
    <script src="bibliotecas/jquery/jquery-2.0.3.min.js" type="text/javascript"></script>
    <!-- locastyle -->
    <script src="bibliotecas/locastyle/locastyle.js" type="text/javascript"></script>
    <!-- bootstrap -->
    <script src="bibliotecas/bootstrap-table.js" type="text/javascript"></script>
    <!-- select2 -->
    <script src="bibliotecas/select2/select2.min.js" type="text/javascript"></script>
    <script src="bibliotecas/select2/i18n/pt-BR.js" type="text/javascript"></script>
    <!-- colorbox -->
    <script src="bibliotecas/colorbox/jquery.colorbox-min.js" type="text/javascript"></script>
    <!-- ckeditor -->
    <script src="bibliotecas/ckeditor/ckeditor.js"></script>
    <!-- jQuery upload -->
    <script src="bibliotecas/html5fileupload/html5fileupload.js?v1.2.1"></script>
    <!-- funcoes -->
    <script src="bibliotecas/funcoes.js" type="text/javascript"></script>
    <script type="text/javascript">
        var SITEURL = "<?= SITEURL ?>";
    </script>
    <!-- ** javascripts **  -->
</head>
<body>
<div class="ls-topbar">

    <div class="ls-notification-topbar">
        <!-- User details -->
        <div data-ls-module="dropdown" class="ls-dropdown ls-user-account">
            <a href="#" class="ls-ico-user"><?=$nomeUsuario?></a>
            <nav class="ls-dropdown-nav ls-user-menu">
                <ul class="ls-no-margin-bottom">
                    <li><a href="?pg=usuarios&acao=pass" title="Alterar Senha">Alterar Senha</a></li>
                    <li><a href="sair.php" title="Encerrar Sistema">Sair</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Nome do sistema/empresa -->
    <h1 class="ls-brand-name">
        <a href="?pg=home" class="ls-ico-text">
            <small><?=$nomeEmpresa?></small>
            <?=$nomeSistema ?>
        </a>
    </h1>
</div>

<main class="ls-main ">
    <div class="container-fluid" id="container_fluid">
        <?php  require ('conteudo.php'); ?>
    </div>
    <div class="processando" id="proc_loader"></div>
</main>

<!-- menu -->
<aside class="ls-sidebar">
    <nav class="ls-menu">
        <ul>
            <li><a class="ls-ico-dashboard" title="Página Inicial" href="?pg=home">Página Inicial</a></li>
            <li><a class="ls-ico-images" title="" href="?pg=slides">Slides</a></li>
            <li><a class="ls-ico-list" title="" href="?pg=categorias">Categorias</a></li>
            <li><a class="ls-ico-insert-template" title="" href="?pg=produtos">Produtos</a></li>
            <li><a class="ls-ico-blank" title="" href="?pg=videos">Vídeos</a></li>
        </ul>
    </nav>
</aside>
<!-- /menu -->

</body>
</html>

<div id="modalMensagem" class="ls-modal">
    <div class="ls-modal-box">
        <div class="ls-modal-header">
            <h4 class="ls-title-3" id="modal-title"></h4>
        </div>
        <div class="ls-modal-body" id="modal-body"></div>
        <div class="ls-modal-footer">
            <a data-dismiss="modal" class="ls-btn" href="javascript:void(0)">OK</a>
        </div>
    </div>
</div>