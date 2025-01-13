<form action="" class="ls-form ls-form-horizontal row" id="form_video" name="form_video">
    <input type="hidden" id="acao" name="acao" value="addVideo">
    <fieldset>
        <label class="ls-label col-md-12">
            <b class="ls-label-text">Link do YouTube (Incorporado/Embed):*</b>
            <div class="ls-prefix-group">
                <span class="ls-label-text-prefix"><i class="fa fa-youtube-play"></i></span>
                <input type="text" id="youtubeVideo" name="youtubeVideo" value="" required>
            </div>
        </label>
    </fieldset>
    <fieldset>
        <label class="ls-label col-md-12">
            <b class="ls-label-text">Título:</b>
            <input type="text" name="tituloVideo" id="tituloVideo" value="" placeholder="">
        </label>
    </fieldset>
    <fieldset>
        <label class="ls-label col-md-12">
            <b class="ls-label-text">Descrição:</b>
            <textarea id="descricaoVideo" name="descricaoVideo" class="ls-textarea-resize-both"></textarea>
        </label>
    </fieldset>
    <fieldset>
        <label class="ls-label col-md-5">
            <b class="ls-label-text">Ativo:</b>
            <input type="radio" name="ativoVideo" value="sim"> Sim
            <input type="radio" name="ativoVideo" value="nao" checked="checked"> Não
        </label>

    </fieldset>
    <div class="ls-actions-btn ls-no-border-top ls-no-padding-top">
        <button type="submit" class="ls-btn-primary ls-ico-checkmark ls-no-margin-top" id="btn1" name="salvar">SALVAR</button>
        <button type="submit" class="ls-btn ls-ico-checkmark ls-no-margin-top" id="btn2" name="salvar_novo">SALVAR E NOVO</button>
        <a href="?pg=videos" class="ls-btn ls-no-margin-top">Cancelar</a>
    </div>
</form>
<br><br>
<script type="text/javascript">
    var editor = CKEDITOR.replace('descricaoVideo', { customConfig: 'config.js' });
</script>