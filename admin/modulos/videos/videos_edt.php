<?php
$idVideo = intval($_GET['id']);

$array = array('idVideo' => $idVideo);
$sql = "SELECT id_video, youtube_video, titulo_video, slug_titulo_video,
          capa_video, descricao_video, duracao_video, ativo_video, data_cadastro_video
        FROM wd_videos 
        WHERE id_video = :idVideo";
$sth = $con->prepare($sql);
$sth->execute($array);

$total = func_pdo_count($con, "wd_videos", " WHERE id_video = :idVideo", $array);

if( intval($total) === 0){
    echo '<div class="ls-alert-danger ls-dismissable"><span data-ls-module="dismiss" class="ls-dismiss">&times;</span><strong>Erro!</strong> A página que você procura não foi encontrada.</div>';
}else{
    while ($l = $sth->fetch(PDO::FETCH_ASSOC)){
        $URLVideo           = $l['youtube_video'];
        $tituloVideo        = $l['titulo_video'];
        $descricaoVideo     = $l['descricao_video'];
        $ativoVideo         = $l['ativo_video'];
    }
?>
<form action="" class="ls-form ls-form-horizontal row" id="form_video" name="form_video">
    <input type="hidden" id="acao" name="acao" value="atuVideo">
    <input type="hidden" id="idVideo" name="idVideo" value="<?=$idVideo?>">

    <fieldset>
        <label class="ls-label col-md-12">
            <b class="ls-label-text">Link do YouTube (Incorporado/Embed):*</b>
            <div class="ls-prefix-group">
                <span class="ls-label-text-prefix"><i class="fa fa-youtube-play"></i></span>
                <input type="text" id="urlDoVideo" name="urlDoVideo" value="<?=$URLVideo?>" required>
            </div>
        </label>
    </fieldset>
    <fieldset>
        <label class="ls-label col-md-12">
            <b class="ls-label-text">Título:</b>
            <input type="text" name="tituloVideo" id="tituloVideo" value="<?=$tituloVideo?>">
        </label>
    </fieldset>
    <fieldset>
        <label class="ls-label col-md-12">
            <b class="ls-label-text">Descrição:</b>
            <textarea id="descricaoVideo" name="descricaoVideo" class="ls-textarea-resize-both"><?=$descricaoVideo?></textarea>
        </label>
    </fieldset>
    <fieldset>
        <label class="ls-label col-md-5">
            <b class="ls-label-text">Ativo:</b>
            <input type="radio" name="ativoVideo"
                <?php if ($ativoVideo == 1) echo "checked"; ?>
                   value="1"> Sim
            <input type="radio" name="ativoVideo"
                <?php if ($ativoVideo == 2) echo "checked"; ?>
                   value="2"> Não
        </label>
    </fieldset>

    <div class="ls-actions-btn ls-no-border-top ls-no-padding-top">
        <button type="submit" class="ls-btn-primary ls-ico-checkmark ls-no-margin-top" id="btn1" name="salvar">SALVAR</button>
        <a href="?pg=videos" class="ls-btn ls-no-margin-top">Cancelar</a>
    </div>
</form>
<br><br>
<? } ?>
<script type="text/javascript">
    var editor = CKEDITOR.replace('descricaoVideo', { customConfig: 'config.js' });
</script>
