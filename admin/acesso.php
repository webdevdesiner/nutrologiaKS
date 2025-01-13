<?php require_once ("php/config.php"); ?>
<!DOCTYPE html>
<html class="<?= $corSistema ?>">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title><?=$nomeSistema ." - ". $nomeEmpresa?></title>

    <!-- ** css ** -->
    <!-- locastyle -->
    <link href="bibliotecas/locastyle/locastyle.css" rel="stylesheet" type="text/css" />
    <!-- font-awesome -->
    <link href="bibliotecas/font-awesome/font-awesome.min.css" rel="stylesheet">
    <!-- login -->
    <link href="css/login.css" rel="stylesheet" type="text/css">
    <!-- ** css ** -->
</head>
<body>

<div class="ls-login-parent">
    <div class="ls-login-inner">
        <div class="ls-login-container">
            <div class="ls-login-box">
                <h1 class="ls-login-logo"></h1>
                <form role="form" class="ls-form ls-login-form" action="login.php" method="post" data-ls-module="form">
                    <fieldset>
                        <label class="ls-label">
                            <b class="ls-label-text ls-hidden-accessible">SEU E-MAIL</b>
                            <input class="ls-login-bg-email ls-field-lg" id="email" name="email" type="text" placeholder="E-mail" required autofocus>
                        </label>

                        <label class="ls-label">
                            <b class="ls-label-text ls-hidden-accessible">SUA SENHA</b>
                            <div class="ls-prefix-group ls-field-lg">
                                <input class="ls-login-bg-password" id="senha" name="senha" type="password" placeholder="Senha" required>
                                <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#senha-login" href="#"></a>
                            </div>
                        </label>
                        <input type="submit" value="Entrar" class="ls-btn-primary ls-btn-block ls-btn-lg ">
                    </fieldset>
                </form>
                <?php
                $msg = "";
                if ( isset($_GET['erro']) && !empty($_GET['erro']) ){
                    $erro = intval($_GET['erro']);
                    if ($erro == 1){
                        $msg = "<div class=\"ls-alert-info ls-dismissable\">
                                    <span data-ls-module=\"dismiss\" class=\"ls-dismiss\">&times;</span>
                                    <strong>Atenção:</strong> E-mail ou senha informado estão incorretos.
                                    </div>";
                    }else if ($erro == 2){
                        $msg = "<div class=\"ls-alert-danger ls-dismissable\">
                                    <span data-ls-module=\"dismiss\" class=\"ls-dismiss\">&times;</span>                
                                    <strong>Importante:</strong> Você não tem acesso ao sistema.
                                </div>";
                    }
                }
                echo $msg;
                ?>
            </div>

            <div class="ls-login-adv">
                <a href="<?=str_replace("admin/", "", SITEURL)?>"><img title="" src="http://pronutry.com.br/imgs/logo.png"></a>
            </div>

        </div>
    </div>
</div>

<!-- ** javascripts ** -->
<!-- jquery -->
<script src="bibliotecas/jquery/jquery-2.0.3.min.js" type="text/javascript"></script>
<!-- locastyle -->
<script src="bibliotecas/locastyle/locastyle.js" type="text/javascript"></script>
<!-- ** javascripts ** -->

</body>
</html>
