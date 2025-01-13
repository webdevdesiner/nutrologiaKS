<?php
require_once BASEPATH . DIRECTORY_SEPARATOR . "seguranca.php";

$WHERE = $AND = "";
$array = array();
if (!empty($busca)) {
    $WHERE .= " WHERE (nome_produto like :busca OR descricao_produto like :busca)";
    $array['busca'] = "%$busca%";
}
if ($destaque == 1 || $destaque == 2) {
    if (!(empty($WHERE)))
        $WHERE .= " AND destaque_produto = :destaque";
    else
        $WHERE .= " WHERE destaque_produto = :destaque";

    $array['destaque'] = $destaque;
}
if (!empty($data_ini)) {
    if (!(empty($WHERE)))
        $WHERE .= " AND data_cadastro_produto BETWEEN :data_ini AND :data_fim";
    else
        $WHERE .= " WHERE data_cadastro_produto BETWEEN :data_ini AND :data_fim";

    $array['data_ini'] = formatarData($data_ini);
    $array['data_fim'] = formatarData(empty($data_fim) ? date("d/m/Y") : $data_fim);
}

if ($ipp == 9999) {
    $LIMIT = "";
} else {
    $LIMIT = " LIMIT $inicio, $ipp";
}

$sql = "SELECT *
            FROM wd_produtos
            {$WHERE} {$AND}
            ORDER BY data_cadastro_produto DESC, nome_produto
            $LIMIT
            ";
//echo $sql;

$total = func_pdo_count($con, "wd_produtos", "{$WHERE} {$AND}", $array);

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
                <th class="ls-txt-left" data-field="titulo" data-sortable="true">NOME</th>
                <th class="ls-txt-left">DESCRIÇÃO</th>
                <th class="ls-txt-center" data-width="10%">DESTAQUE</th>
                <th class="ls-txt-center" data-width="10%">FOTOS</th>
                <th class="ls-txt-center" data-width="15%">AÇÕES</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($l = $sth->fetch(PDO::FETCH_ASSOC)) {
                $destaque = $l['destaque_produto'] == 1 ? "Sim" : "Não";
                $fotos = func_pdo_count($con, "wd_produtos_fotos", " WHERE id_produto_foto = {$l['id_produto']}"); ?>
                <tr>
                    <td class="ls-txt-center"><?= $l['data_cadastro_produto'] ?></td>
                    <td class="ls-txt-left"><?= $l['nome_produto'] ?></td>
                    <td class="ls-txt-left"><?= func_limita_caracteres(sanitize($l['descricao_produto']), 80, false) ?></td>
                    <td class="ls-txt-center"><?= $destaque ?></td>
                    <td class="ls-txt-center"><?= $fotos ?></td>
                    <td class="ls-txt-center">
                        <a href="?pg=produtos&acao=edt&id=<?= $l['id_produto'] ?>" class="ls-btn" title="Editar"><span
                                    class="ls-ico-pencil"></span></a>
                        <a href="?pg=produtos&acao=fotos&id=<?= $l['id_produto'] ?>" class="ls-btn" title="Fotos"><span
                                    class="ls-ico-camera"></span></a>
                        <a id="<?= $l['id_produto'] ?>" data-nome="<?= $l['nome_produto'] ?>"
                           class="ls-btn-danger abreModalExcluirProduto" href="javascript:void(0);"
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
