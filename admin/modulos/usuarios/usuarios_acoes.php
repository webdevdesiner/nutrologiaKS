<?php
require_once ("../../php/config.php");

/* == Atualiza == */
if (isset($_POST['acao']) && $_POST['acao'] == 'atuSenhaUsuario'){
    foreach($_POST as $key => $valor){
        $_POST[$key] = sanitize($valor);
    }
    
    $idUsuario 	    = $_POST['idUsuario'];
    $senhaUsuario	= trim($_POST['senhaUsuario']);

    if ($senhaUsuario != ''){

        $array = array('idUsuario' => $idUsuario, 'senhaUsuario' => Bcrypt::hash($senhaUsuario)
        );

        try {
            $sql = "UPDATE wd_usuarios 
                    SET senha_usuario = :senhaUsuario
                    WHERE id_usuario = :idUsuario";

            $sth = $con->prepare($sql);
            $sth->execute($array);

            $json['status'] = 1;
            $json['titulo'] = 'Sucesso!';
            $json['msg'] = '<p>Senha atualizada corretamente.</p>';
        } catch (PDOException $ex) {
            $json['status'] = 0;
            $json['titulo'] = 'Erro!';
            $json['msg'] = '<p>Não foi possível atualizar a senha.</p>';
        }
    }else{
        $json['status'] = 1;
        $json['titulo'] = 'Aviso!';
        $json['msg'] = '<p>Nenhuma senha foi informada.</p>';
    }

    echo json_encode($json);
}
?>
