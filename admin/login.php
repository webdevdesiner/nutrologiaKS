<?php require_once ("php/config.php"); ?>
<?php
if( getenv("REQUEST_METHOD") == "POST" && !empty($_POST["email"]) && !empty($_POST["senha"])){

    $login  = isset($_POST["email"]) ? limpa($_POST["email"]) : "";
    $senha  = isset($_POST["senha"]) ? limpa($_POST["senha"]) : "";

    $sql = sprintf("SELECT senha_usuario
                    FROM wd_usuarios
                    WHERE login_usuario = '%s'", $login);

    $r = $con->query($sql);
    $senhaBD = $r->fetch(PDO::FETCH_OBJ)->senha_usuario;

    if (Bcrypt::check($senha, $senhaBD)) {
        $r = $con->query("SELECT * FROM wd_usuarios WHERE login_usuario = '".$login."'");
        $l = $r->fetch(PDO::FETCH_ASSOC);

        if($l["acesso_usuario"] == "sim"){
            $dados             		= array();
            $dados["idUsuario"]		= $l['id_usuario'];
            $dados["nomeUsuario"]   = $l['nome_usuario'];

            session_start();
            $_SESSION["apps_20032019"] = $dados;
            header("Location: gerenciador.php");
        } else {
            header("Location: acesso.php?erro=2");
        }
    } else {
        header("Location: acesso.php?erro=1");
    }
}else{
    header("Location: acesso.php");
}
?>