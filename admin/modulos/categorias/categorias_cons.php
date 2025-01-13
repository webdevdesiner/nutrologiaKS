<?php
require_once BASEPATH . DIRECTORY_SEPARATOR . "seguranca.php";

$WHERE = "";
$array = array();
if (!empty($busca)) {
    $WHERE .= " WHERE (nome_categoria like :busca)";
    $array['busca'] = "%$busca%";
}

if ($ipp == 9999) {
    $LIMIT = "";
} else {
    $LIMIT = " LIMIT $inicio, $ipp";
}

$sql = "SELECT *
        FROM wd_categorias
        {$WHERE}
        ORDER BY nome_categoria
        $LIMIT
        ";
//echo $sql;

$sth = $con->prepare($sql);
$sth->execute($array);

$total = func_pdo_count($con, "wd_categorias", $WHERE, $array);
if ($total > 0) {
    if ($WHERE != "")
        echo "<p><i>Sua busca retornou " . $total . " resultado(s)</i></p>";
    ?>
    <table class="ls-table ls-table-striped ls-no-margin" data-toggle="table">
        <thead>
        <tr>
            <th class="ls-txt-center" data-width="5%">#</th>
            <th class="ls-txt-left" data-sortable="true">CATEGORIA</th>
            <th class="ls-txt-center" data-width="12%">AÇÕES</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($l = $sth->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td class="ls-txt-center"><?= $l['id_categoria'] ?></td>
                <td class="ls-txt-left"><?= $l['nome_categoria'] ?></td>
                <td class="ls-txt-center">
                    <a href="?pg=categorias&acao=edt&id=<?= $l['id_categoria'] ?>" class="ls-btn" title="Editar">
                        <span class="ls-ico-pencil"></span>
                    </a>
                    <a id="<?= $l['id_categoria'] ?>" data-nome="<?= $l['nome_categoria'] ?>"
                       class="ls-btn-danger abreModalExcluirCategoria" href="javascript:void(0);" title="Excluir">
                        <span class='ls-ico-remove'></span>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <div class="ls-pagination-filter">
        <ul class="ls-pagination">
            <?php require_once(BASEPATH . DIRECTORY_SEPARATOR . "php/paginacao.php") ?>
        </ul>
        <div class="ls-filter-view">
            Exibir
            <div class="ls-custom-select ls-field-sm">
                <select id="itensPorPagina" class="ls-select">
                    <?php $selected = 'selected="selected"'; ?>
                    <option value="10" <?php if ($ipp == 10) echo $selected; ?>>10</option>
                    <option value="25" <?php if ($ipp == 25) echo $selected; ?>>25</option>
                    <option value="50" <?php if ($ipp == 50) echo $selected; ?>>50</option>
                    <option value="100" <?php if ($ipp == 100) echo $selected; ?>>100</option>
                    <option value="9999" <?php if ($ipp == 9999) echo $selected; ?>>TODOS</option>
                </select>
            </div>
            ítens por página
        </div>
    </div>
    <br class="ls-clear-both"><br>
<?php } else echo "<div class=\"ls-alert-info\"><strong>Nenhum resultado</strong> para sua busca. Tente novamente.</div>"; ?>