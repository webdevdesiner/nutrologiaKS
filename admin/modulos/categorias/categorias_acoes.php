<?php
require_once ("../../php/config.php");

/* == Adiciona == */
if (isset($_POST['acao']) && $_POST['acao'] == 'addCategoria') {

    $json = array();
    foreach ($_POST as $key => $valor) {
        $_POST[$key] = sanitize($valor);
    }

    $nomeCategoria = $_POST['nomeCategoria'];
    $slugNomeCategoria = func_url_amigavel($_POST['nomeCategoria']);

    $WHERE = " WHERE nome_categoria LIKE :nomeCategoria";
    $array = array('nomeCategoria' => $nomeCategoria);

    $existe = func_pdo_count($con, "wd_categorias", $WHERE, $array);

    if ($existe == 1) {
        $json['status'] = 2;
        $json['titulo'] = 'Atenção!';
        $json['msg'] = '<p>Categoria já cadastrada.</p>';
    } else {

        $array = array('nomeCategoria' => $nomeCategoria, 'slugNomeCategoria' => $slugNomeCategoria);
        $sql = "INSERT INTO wd_categorias (nome_categoria, slug_nome_categoria)
                VALUES (:nomeCategoria, :slugNomeCategoria)";
        $sth = $con->prepare($sql);

        try {
            $sth->execute($array);

            $json['status'] = 1;
            $json['titulo'] = 'Sucesso!';
            $json['msg'] = '<p>Dados cadastrados corretamente.</p>';

        } catch (PDOException $ex) {
            $json['status'] = 2;
            $json['titulo'] = 'Ocorreu um problema!';
            $json['msg'] = '<p> No momento não foi possível cadastrar a categoria corretamente.</p>';
        }
    }

    echo json_encode($json);
}

/* == Atualiza == */
if (isset($_POST['acao']) && $_POST['acao'] == 'atuCategoria') {

    $json = array();
    foreach ($_POST as $key => $valor) {
        $_POST[$key] = sanitize($valor);
    }

    $idCategoria            = intval($_POST['idCategoria']);
    $nomeCategoria          = $_POST['nomeCategoria'];
    $slugNomeCategoria      = func_url_amigavel($_POST['nomeCategoria']);

    $WHERE = " WHERE nome_categoria LIKE :nomeCategoria AND id_categoria <> :idCategoria";
    $array = array('idCategoria' => $idCategoria, 'nomeCategoria' => $nomeCategoria);

    $existe = func_pdo_count($con, "wd_categorias", $WHERE, $array);

    if ($existe == 1) {
        $json['status'] = 2;
        $json['titulo'] = 'Atenção!';
        $json['msg'] = '<p>Categoria já cadastrada.</p>';
    } else {
        $array = array('idCategoria' => $idCategoria, 'nomeCategoria' => $nomeCategoria, 'slugNomeCategoria' => $slugNomeCategoria);
        $sql = "UPDATE wd_categorias 
            SET 
                nome_categoria = :nomeCategoria,
                slug_nome_categoria = :slugNomeCategoria
            WHERE id_categoria = :idCategoria";
        $sth = $con->prepare($sql);

        try {
            $sth->execute($array);

            $json['status'] = 1;
            $json['titulo'] = 'Sucesso!';
            $json['msg'] = '<p>Dados atualizados corretamente.</p>';
        } catch (PDOException $ex) {
            $json['status'] = 2;
            $json['titulo'] = 'Ocorreu um problema!';
            $json['msg'] = '<p> No momento não foi possível atualizar a categoria corretamente.</p>';
        }
    }

    echo json_encode($json);
}

/* == Exclui == */
if (isset($_POST['acao']) && $_POST['acao'] == 'delCategoria') {

    $json = array();
    $idCategoria = intval($_POST['idCategoria']);

    $sql = "DELETE FROM wd_categorias WHERE id_categoria = :idCategoria";
    $array['idCategoria'] = $idCategoria;
    $sth = $con->prepare($sql);

    try {
        $sth->execute($array);

        $json['status'] = 1;
        $json['titulo'] = 'Sucesso!';
        $json['msg'] = '<p>Registro excluído corretamente.</p>';

    } catch (PDOException $ex) {
        $json['status'] = 0;
        $json['titulo'] = 'Erro!';
        $json['msg'] = '<p>Não foi possível excluir o registro.</p>';
    }

    echo json_encode($json);
}
?>
