<?php
    $array = array('idUsuario' => $_SESSION["apps_20032019"]['idUsuario']); // session

    $sql = "SELECT nome_usuario, login_usuario
            FROM wd_usuarios WHERE id_usuario = :idUsuario";
    $sth = $con->prepare($sql);
    $sth->execute($array);

    while ($l = $sth->fetch(PDO::FETCH_ASSOC)){
        $loginUsuario = $l['login_usuario'];
        $nomeUsuario = $l['nome_usuario'];
    }
?>
<form action="" class="ls-form ls-form-horizontal row" name="form_pass" id="form_pass">
    <input type="hidden" id="acao" name="acao" value="atuSenhaUsuario">
    <input type="hidden" id="idUsuario" name="idUsuario" value="<?=$_SESSION["apps_20032019"]["idUsuario"]?>">

    <fieldset>
        <label class="ls-label col-md-5">
            <b class="ls-label-text">Nome Completo:</b>
            <input type="text" id="nomeCompletoUsuario" name="nomeCompletoUsuario" value="<?= $nomeUsuario ?>" disabled>
        </label>

        <label class="ls-label col-md-3">
            <b class="ls-label-text">Usuário:</b>
            <input type="text" id="loginUsuario" name="loginUsuario" value="<?=$loginUsuario?>" disabled="">
        </label>
    </fieldset>

    <fieldset>
        <label class="ls-label col-md-3">
            <b class="ls-label-text">Senha:</b>
            <div class="ls-prefix-group">
                <input type="password" maxlength="20" id="senhaUsuario" name="senhaUsuario" value="" placeholder="informe se for trocar">
                <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#senhaUsuario" href="#">
                </a>
            </div>
        </label>
    </fieldset>

    <div class="ls-actions-btn ls-no-border-top ls-no-padding-top">
        <button type="submit" class="ls-btn-primary ls-ico-checkmark ls-no-margin-top" name="salvar">SALVAR</button>
        <a href="?pg=home" class="ls-btn ls-no-margin-top">Cancelar</a>
    </div>
</form>