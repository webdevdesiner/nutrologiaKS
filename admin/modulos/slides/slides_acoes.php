<?php
require_once ("../../php/config.php");

/* == Adiciona == */
if (isset($_POST['acao']) && $_POST['acao'] == 'addSlide') {
    $json = array();

    $numArquivos = count($_FILES['file']['name']);
    $fileSize = $_FILES['file']['size'][0];
    if ($numArquivos > 0 && $fileSize > 0) {
        $arquivoID = 0;

        while ($arquivoID < $numArquivos) {
            // caso não exista diretório, cria
            if (!file_exists(DIR_MODS_SLIDES_UP)) {
                mkdir(str_replace('//', '/', DIR_MODS_SLIDES_UP), 0755, true);
            }

            $nomeArquivo = tratar_nome_arquivo_sem_sha1(utf8_decode($_FILES['file']['name'][$arquivoID]));
            $diretorio_up = DIR_MODS_SLIDES_UP . $nomeArquivo;

            // upload
            move_uploaded_file($_FILES['file']['tmp_name'][$arquivoID], $diretorio_up);
            // cadastra no banco
            $array = array('arquivoSlide' => $nomeArquivo);
            $sql = "INSERT INTO wd_slides (arquivo_slide) VALUES (:arquivoSlide)";
            $sth = $con->prepare($sql);
            $sth->execute($array);

            $arquivoID++;
        }
        $json['status'] = 1;
        $json['titulo'] = 'Sucesso!';
        $json['msg'] = '<p> Slide(s) cadastrado(s) corretamente.</p>';
    } else {
        $json['status'] = 9;
        $json['titulo'] = 'Atenção!';
        $json['msg'] = '<p>Nenhum arquivo foi adicionado.</p><p>Por favor, inserir um arquivo para que possa ser salvo.</p>';
    }

    echo json_encode($json);
}

/* == Exclui == */
if (isset($_POST['acao']) && $_POST['acao'] == 'delSlide') {
    $idSlide = intval($_POST['idSlide']);
    $arquivo = $_POST['arquivo'];
    $json = array();

    $sql = "DELETE FROM wd_slides WHERE id_slide = :idSlide";
    $array['idSlide'] = $idSlide;

    $sth = $con->prepare($sql);
    try {
        $sth->execute($array);

        $json['status'] = 1;
        $json['titulo'] = 'Sucesso!';
        $json['msg'] = '<p>Slide excluído com sucesso.</p>';
    } catch (PDOException $ex) {
        $json['status'] = 0;
        $json['titulo'] = 'Erro!';
        $json['msg'] = '<p>Não foi possível excluir a foto.</p>';
    }
    //Exclui arquivo
    func_excluir_arquivo( DIR_MODS_SLIDES_UP . $arquivo);

    echo json_encode($json);
}
?>
