<?php
require_once ("../../php/config.php");

/* == Adiciona == */
if (isset($_POST['acao']) && $_POST['acao'] == 'addVideo') {

    $json = array();

    foreach ($_POST as $key => $valor) {
        if ($key == "descricaoVideo")
            continue;
        $_POST[$key] = sanitize($valor);
    }

    $youtubeVideo       = $_POST['youtubeVideo'];
    $tituloVideo        = $_POST['tituloVideo'];
    $descricaoVideo     = $_POST['descricaoVideo'];
    $ativoVideo         = $_POST['ativoVideo'];

    $WHERE = " WHERE titulo_video LIKE :tituloVideo";
    $array['tituloVideo'] = "$tituloVideo";

    $existe = func_pdo_count($con, "wd_videos", $WHERE, $array);

    if ($existe == 1) {
        $json['status'] = 2;
        $json['titulo'] = 'Atenção!';
        $json['msg'] = '<p>Título já cadastrado.</p>';
    } else {
        $sql = "INSERT INTO wd_videos (youtube_video, titulo_video, slug_titulo_video, 
                      descricao_video, ativo_video, data_cadastro_video)
            VALUES  (:youtubeVideo, :tituloVideo, :slugTituloVideo,
                     :descricaoVideo, :ativoVideo, NOW())";

        $array['youtubeVideo']      = $youtubeVideo;
        $array['tituloVideo']       = $tituloVideo;
        $array['slugTituloVideo']   = func_url_amigavel($tituloVideo);
        $array['descricaoVideo']    = "$descricaoVideo";
        $array['ativoVideo']        = $ativoVideo == "sim" ? 1 : 2;

        $sth = $con->prepare($sql);

        try {
            $sth->execute($array);

            $json['status'] = 1;
            $json['titulo'] = 'Sucesso!';
            $json['msg'] = '<p>Dados cadastrados corretamente.</p>';

        } catch (PDOException $ex) {
            $json['status'] = 2;
            $json['titulo'] = 'Ocorreu um problema!';
            $json['msg'] = '<p> No momento não foi possível cadastrar o vídeo corretamente.</p>';
        }
    }

    echo json_encode($json);
}

/* == Atualiza == */
if (isset($_POST['acao']) && $_POST['acao'] == 'atuVideo') {

    $json = array();

    foreach ($_POST as $key => $valor) {
        if ($key == "descricaoVideo")
            continue;
        $_POST[$key] = sanitize($valor);
    }

    $idVideo          = intval($_POST['idVideo']);

    $urlDoVideo       = $_POST['urlDoVideo'];
    $tituloVideo      = $_POST['tituloVideo'];
    $slugTituloVideo  = func_url_amigavel($tituloVideo);
    $descricaoVideo   = $_POST['descricaoVideo'];
    $ativoVideo       = $_POST['ativoVideo'];

    $WHERE = " WHERE id_video != :idVideo AND titulo_video = :tituloVideo";
    $array['idVideo'] = "$idVideo";
    $array['tituloVideo'] = "$tituloVideo";
    $existe = func_pdo_count($con, "wd_videos", $WHERE, $array);

    if ($existe == 1) {
        $json['status'] = 2;
        $json['titulo'] = 'Atenção!';
        $json['msg'] = '<p>Vídeo já cadastrado.</p>';
    } else {
        $array = array('idVideo' => $idVideo, 'urlDoVideo' => $urlDoVideo, 'tituloVideo' => $tituloVideo, 'slugTituloVideo' => $slugTituloVideo,
            'descricaoVideo' => $descricaoVideo, 'ativoVideo' => $ativoVideo);

        try {
            $sql = "UPDATE wd_videos 
                    SET youtube_video = :urlDoVideo,
                        titulo_video = :tituloVideo,
                        slug_titulo_video = :slugTituloVideo,
                        descricao_video = :descricaoVideo,
                        ativo_video = :ativoVideo
                    WHERE id_video = :idVideo";

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

/* == Exclui == */
if (isset($_POST['acao']) && $_POST['acao'] == 'delVideo') {

    $json = array();

    $idVideo = intval($_POST['idVideo']);

    $sql = "DELETE FROM wd_videos WHERE id_video = :idVideo";
    $array['idVideo'] = $idVideo;

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

/* == Atualiza == */
if (isset($_GET['acao']) && $_GET['acao'] == 'dadosVideo') {
    // URL do vídeo
    $urlYoutube = $_GET['url'];
    // chamada da função
    $dados = func_getDadosYoutube($urlYoutube);
    // retorna json
    echo json_encode($dados);
}
?>
