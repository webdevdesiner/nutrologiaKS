<?php
require_once ("../../php/config.php");

/* == Adiciona == */
if (isset($_POST['acao']) && $_POST['acao'] == 'addProduto') {

    $json = array();

    foreach ($_POST as $key => $valor) {
        if ($key == "descricaoProduto")
            continue;
        $_POST[$key] = sanitize($valor);
    }

    $nomeProduto        = $_POST['nomeProduto'];
    $IDCategoriaProduto = intval($_POST['IDCategoriaProduto']);
    $quantidadeProduto  = $_POST['quantidadeProduto'];
    $descricaoProduto   = $_POST['descricaoProduto'];
    $destaqueProduto    = $_POST['destaqueProduto'];
    $capaProduto        = $_POST['capaProduto']; //array

    $WHERE = " WHERE nome_produto LIKE :nomeProduto";
    $array['nomeProduto'] = "$nomeProduto";

    $existe = func_pdo_count($con, "wd_produtos", $WHERE, $array);

    if ($existe == 1) {
        $json['status'] = 2;
        $json['titulo'] = 'Atenção!';
        $json['msg'] = '<p>Produto já cadastrado.</p>';
    } else {
        $sql = "INSERT INTO wd_produtos (id_categoria_produto, nome_produto, url_nome_produto, quantidade_produto, 
                      data_cadastro_produto, descricao_produto, destaque_produto, capa_produto)
            VALUES  (:IDCategoriaProduto, :nomeProduto, :urlNomeProduto, :quantidadeProduto, 
                     NOW(), :descricaoProduto, :destaqueProduto, :capaProduto)";

        $array['IDCategoriaProduto']    = $IDCategoriaProduto;
        $array['urlNomeProduto']        = func_url_amigavel($nomeProduto);
        $array['quantidadeProduto']     = $quantidadeProduto;
        $array['descricaoProduto']      = "$descricaoProduto";
        $array['destaqueProduto']       = $destaqueProduto == "sim" ? 1 : 2;
        $array['capaProduto']           = "sem-foto.jpg"; // define uma capa caso não tenha enviado

        $sth = $con->prepare($sql);

        try {
            $sth->execute($array);
            //Último Id inserido
            $idProduto = $con->lastInsertId();

            $json['status'] = 1;
            $json['titulo'] = 'Sucesso!';
            $json['msg'] = '<p>Dados cadastrados corretamente.</p>';

            try {
                $numArquivos = count($_FILES['file']['name']);
                $fileSize = $_FILES['file']['size'][0];
                if ($numArquivos > 0 && $fileSize > 0) {
                    $arquivoID = 0;

                    while ($arquivoID < $numArquivos) {
                        include 'produtos_fotos_up.php';
                        $arquivoID++;
                    }
                    $json['status'] = 1;
                    $json['msg'] .= '<p> Foto(s) cadastrada(s) corretamente.</p>';
                }
            } catch (PDOException $ex) {
                $json['status'] = 3;
                $json['msg'] .= '<p>Porém, no momento não foi possível cadastrar a(s) foto(s) corretamente.</p>';
            }
        } catch (PDOException $ex) {
            $json['status'] = 2;
            $json['titulo'] = 'Ocorreu um problema!';
            $json['msg'] = '<p> No momento não foi possível cadastrar o produto corretamente.</p>';
        }
    }

    echo json_encode($json);
}

/* == Atualiza == */
if (isset($_POST['acao']) && $_POST['acao'] == 'atuProduto') {

    $json = array();

    foreach ($_POST as $key => $valor) {
        if ($key == "descricaoProduto")
            continue;
        $_POST[$key] = sanitize($valor);
    }

    $idProduto          = intval($_POST['idProduto']);
    $IDCategoriaProduto = intval($_POST['IDCategoriaProduto']);

    $nomeProduto        = $_POST['nomeProduto'];
    $urlNomeProduto     = func_url_amigavel($nomeProduto);
    $quantidadeProduto  = $_POST['quantidadeProduto'];
    $descricaoProduto   = $_POST['descricaoProduto'];
    $destaqueProduto    = $_POST['destaqueProduto'];

    $WHERE = " WHERE id_produto != :idProduto AND nome_produto = :nomeProduto";
    $array['idProduto'] = "$idProduto";
    $array['nomeProduto'] = "$nomeProduto";
    $existe = func_pdo_count($con, "wd_produtos", $WHERE, $array);

    if ($existe == 1) {
        $json['status'] = 2;
        $json['titulo'] = 'Atenção!';
        $json['msg'] = '<p>Produto já cadastrado.</p>';
    } else {
        $array = array('idProduto' => $idProduto, 'IDCategoriaProduto' => $IDCategoriaProduto,
            'nomeProduto' => $nomeProduto, 'urlNomeProduto' => $urlNomeProduto,
            'quantidadeProduto' => $quantidadeProduto, 'descricaoProduto' => $descricaoProduto,
            'destaqueProduto' => $destaqueProduto);

        try {
            $sql = "UPDATE wd_produtos 
                    SET id_categoria_produto = :IDCategoriaProduto,
                        nome_produto = :nomeProduto,
                        url_nome_produto = :urlNomeProduto,
                        quantidade_produto = :quantidadeProduto,
                        descricao_produto = :descricaoProduto,
                        destaque_produto = :destaqueProduto
                    WHERE id_produto = :idProduto";

            $sth = $con->prepare($sql);
            $sth->execute($array);

            $json['status'] = 1;
            $json['titulo'] = 'Sucesso!';
            $json['msg'] = '<p>Dados atualizados corretamente.</p>';
        } catch (PDOException $ex) {
            $json['status'] = 0;
            $json['titulo'] = 'Erro!';
            $json['msg'] = '<p>Não foi possível atualizar o registro.</p>';
        }
    }

    echo json_encode($json);
}

/* == Adiciona foto == */
if (isset($_POST['acao']) && $_POST['acao'] == 'addFotoProduto') {

    $json = array();
    $idProduto = intval($_POST['idProduto']);

    $numArquivos = count($_FILES['file']['name']);
    $fileSize = $_FILES['file']['size'][0];
    if ($numArquivos > 0 && $fileSize > 0) {
        $arquivoID = 0;

        while ($arquivoID < $numArquivos) {
            include 'produtos_fotos_up.php';
            $arquivoID++;
        }
        $json['status'] = 1;
        $json['titulo'] = 'Sucesso!';
        $json['msg'] = '<p> Foto cadastrada corretamente.</p>';
    } else {
        $json['status'] = 9;
        $json['titulo'] = 'Aviso!';
        $json['msg'] = '<p>Nenhum arquivo foi adicionado.</p><p>Por favor, inserir um arquivo para que possa ser salvo.</p>';
    }

    echo json_encode($json);
}

/* == Exclui == */
if (isset($_POST['acao']) && $_POST['acao'] == 'delProduto') {

    $json = array();

    $idProduto = intval($_POST['idProduto']);

    $sql = "DELETE FROM wd_produtos WHERE id_produto = :idProduto";
    $array['idProduto'] = $idProduto;

    $sth = $con->prepare($sql);

    try {
        $sth->execute($array);
        $json['status'] = 1;
        $json['titulo'] = 'Sucesso!';
        $json['msg'] = '<p>Registro excluído corretamente.</p>';

        // Exclui diretorio
        func_excluir_diretorio(DIR_MODS_PRODUTOS_UP . $idProduto);
    } catch (PDOException $ex) {
        $json['status'] = 0;
        $json['titulo'] = 'Erro!';
        $json['msg'] = '<p>Não foi possível excluir o registro.</p>';
    }

    echo json_encode($json);
}

/* == Exclui foto == */
if (isset($_POST['acao']) && $_POST['acao'] == 'delFotoProduto') {

    $json = array();

    $idFotoProduto  = intval($_POST['idFotoProduto']);
    $idProduto      = intval($_POST['idProduto']);
    $capaProduto    = $_POST['capaProduto'];

    $sql = "DELETE FROM wd_produtos_fotos WHERE id_foto = :idFoto";
    $array['idFoto'] = $idFotoProduto;
     $sth = $con->prepare($sql);

    try {
        $sth->execute($array);

        $json['status'] = 1;
        $json['titulo'] = 'Sucesso!';
        $json['msg'] = '<p>Foto excluída com sucesso.</p>';
    } catch (PDOException $ex) {
        $json['status'] = 0;
        $json['titulo'] = 'Erro!';
        $json['msg'] = '<p>Não foi possível excluir a foto.</p>';
    }
    //Exclui arquivo
    func_excluir_arquivo(DIR_MODS_PRODUTOS_UP . $capaProduto);

    echo json_encode($json);
}
?>
