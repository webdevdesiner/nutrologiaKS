<?php
require_once BASEPATH . DIRECTORY_SEPARATOR . "seguranca.php";

$WHERE = $AND = "";
$array = array();
if (!empty($busca)) {
    $WHERE .= " WHERE (titulo_video like :busca OR descricao_video like :busca)";
    $array['busca'] = "%$busca%";
}
if ($ativo == 1 || $ativo == 2) {
    if (!(empty($WHERE)))
        $WHERE .= " AND ativo_video = :ativo";
    else
        $WHERE .= " WHERE ativo_video = :ativo";

    $array['ativo'] = $ativo;
}
if (!empty($data_ini)) {
    if (!(empty($WHERE)))
        $WHERE .= " AND data_cadastro_video BETWEEN :data_ini AND :data_fim";
    else
        $WHERE .= " WHERE data_cadastro_video BETWEEN :data_ini AND :data_fim";

    $array['data_ini'] = formatarData($data_ini);
    $array['data_fim'] = formatarData(empty($data_fim) ? date("d/m/Y") : $data_fim);
}

if ($ipp == 9999) {
    $LIMIT = "";
} else {
    $LIMIT = " LIMIT $inicio, $ipp";
}

$sql = "SELECT *
            FROM wd_videos
            {$WHERE} {$AND}
            ORDER BY data_cadastro_video DESC, titulo_video
            $LIMIT
            ";
//echo $sql;

$total = func_pdo_count($con, "wd_videos", "{$WHERE} {$AND}", $array);

$sth = $con->prepare($sql);
$sth->execute($array);

if ($total > 0) {
    if ($WHERE != "")
        echo "<p><i>Sua busca retornou " . $total . " resultado(s)</i></p>";
    ?>
    <form name="admin_form" id="admin_form" method="post" action="">
        <table class="ls-table ls-table-striped ls-no-margin" data-toggle="table" data-sort-name="date"
               data-sort-order="desc">
            <thead>
            <tr>
                <th class="ls-txt-center" data-field="date" data-width="10%" data-sortable="true"
                    data-formatter="formataData">DATA
                </th>
                <th class="ls-txt-left">LINK</th>
                <th class="ls-txt-left" data-field="titulo" data-sortable="true">TÍTULO</th>
                <th class="ls-txt-center" data-sortable="true" data-width="10%">ATIVO</th>
                <th class="ls-txt-center" data-width="15%">AÇÕES</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($l = $sth->fetch(PDO::FETCH_ASSOC)) {
                $ativo = $l['ativo_video'] == 1 ? "Sim" : "Não";
                ?>
                <tr>
                    <td class="ls-txt-center"><?= $l['data_cadastro_video'] ?></td>
                    <td class="ls-txt-left"><a href="<?= $l['youtube_video'] ?>" target="_blank"><?= $l['youtube_video'] ?></a></td>
                    <td class="ls-txt-left"><?= !empty($l['titulo_video']) ? $l['titulo_video'] : "-" ?></td>
                    <td class="ls-txt-center"><?= $ativo ?></td>
                    <td class="ls-txt-center">
                        <a href="?pg=videos&acao=edt&id=<?= $l['id_video'] ?>" class="ls-btn" title="Editar"><span
                                    class="ls-ico-pencil"></span></a>
                        <a id="<?= $l['id_video'] ?>" data-nome="<?= $l['titulo_video'] ?>"
                           class="ls-btn-danger abreModalExcluirVideo" href="javascript:void(0);"
                           title="Excluir"><span class="ls-ico-remove"></span></a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <div class="ls-pagination-filter">
            <ul class="ls-pagination">
                <?php require_once(BASEPATH . DIRECTORY_SEPARATOR . "php/paginacao.php") ?>
            </ul>
            <div class="ls-filter-view">
                <label>
                    Exibir
                    <div class="ls-custom-select ls-field-sm">
                        <select id="itensPorPagina" class="ls-select">
                            <?php $selected = 'selected="selected"'; ?>
                            <option value="10" <?php if ($ipp == 10) echo $selected; ?>>10</option>
                            <option value="25" <?php if ($ipp == 25) echo $selected; ?>>25</option>
                            <option value="50" <?php if ($ipp == 50) echo $selected; ?>>50</option>
                            <option value="100" <?php if ($ipp == 100) echo $selected; ?>>100</option>
                            <option value="9999" <?php if ($ipp == 9999) echo $selected; ?>>Todos</option>
                        </select>
                    </div>
                    ítens por página
                </label>
            </div>
        </div>
        <br class="ls-clear-both"><br>
    </form>
<?php } else echo "<div class=\"ls-alert-info\"><strong>Nenhum resultado</strong> para sua busca. Tente novamente.</div>"; ?>
