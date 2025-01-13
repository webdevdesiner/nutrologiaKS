<?php
require_once BASEPATH . DIRECTORY_SEPARATOR . "seguranca.php";

// caso não exista diretório, cria
if (!file_exists(DIR_MODS_PRODUTOS_UP . $idProduto)) {
    mkdir(str_replace('//', '/', DIR_MODS_PRODUTOS_UP . $idProduto), 0755, true);
}

$nomeArquivo = tratar_nome_arquivo(utf8_decode($_FILES['file']['name'][$arquivoID]));
$diretorio_up = DIR_MODS_PRODUTOS_UP . $idProduto . DIRECTORY_SEPARATOR .$nomeArquivo;

// caso não exista o arquivo
if (!file_exists($diretorio_up)) {
    // instanciando a classe
    $upload = new Upload($_FILES['file']['tmp_name'][$arquivoID], $nomeArquivo, $larguraMaxima, $alturaMaxima, DIR_MODS_PRODUTOS_UP . $idProduto);
    // upload das imagens
    $upload->salvar();

    $array = array('idProduto' => $idProduto, 'arquivoFoto' => $idProduto . "/" . $nomeArquivo);
    $sql = "INSERT INTO wd_produtos_fotos (id_produto_foto, arquivo_foto)
            VALUES  (:idProduto, :arquivoFoto)";

    $sth = $con->prepare($sql);
    $sth->execute($array);

    // atualiza capa
    $array = array('idProduto' => $idProduto, 'arquivoFoto' => $idProduto . "/" . $nomeArquivo);
    $sql = "UPDATE wd_produtos SET capa_produto = :arquivoFoto
        WHERE id_produto = :idProduto";

    $sth = $con->prepare($sql);
    $sth->execute($array);
}
?>