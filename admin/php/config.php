<?php
$currentPath = $_SERVER['PHP_SELF'];
$pathInfo = pathinfo($currentPath);
$hostName = $_SERVER['HTTP_HOST'];
$protocolo = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https://' ? 'https://' : 'http://';

if (($hostName == 'localhost') || ($hostName == '127.0.0.1')) {
    $site_url = $protocolo . $hostName . $pathInfo['dirname'] . "/";
} else {
    $site_url = $protocolo . $hostName . $pathInfo['dirname'];
}

// dominio
define("SITEURL", $site_url);
// http://localhost/projeto/admin/
//var_dump( SITEURL );
//echo "<br>";

// caminho absoluto windows/linux
define ("BASEPATH", dirname(dirname(__FILE__)));
//var_dump( BASEPATH );

//--------------------------------------------------
// MODULOS
//--------------------------------------------------
define("DIR_MODS", "modulos/");
//--------------------------------------------------
// MODULO > SLIDES
//--------------------------------------------------
define("DIR_MODS_SLIDES", "modulos/slides/");
define("DIR_MODS_SLIDES_UP", BASEPATH . DIRECTORY_SEPARATOR . "uploads/slides/");
define("DIR_MODS_SLIDES_URL", SITEURL . DIRECTORY_SEPARATOR . "uploads/slides/");
define("DIR_MODS_SLIDES_ADMIN_URL", SITEURL . "admin/uploads/slides/");
//--------------------------------------------------
// MODULO > PRODUTOS
//--------------------------------------------------
define("DIR_MODS_PRODUTOS", "modulos/produtos/");
define("DIR_MODS_PRODUTOS_UP", BASEPATH . "/uploads/produtos/");
define("DIR_MODS_PRODUTOS_URL", SITEURL . "/uploads/produtos/");
define("DIR_MODS_PRODUTOS_ADMIN_URL", SITEURL . "/admin/uploads/produtos/");


/*define("DIR_MODS", "modulos/");
define("DIR_MODS", "modulos/");
define("DIR_MODS", "modulos/");*/

//require_once (BASEPATH . DIRECTORY_SEPARATOR . "seguranca.php");
require_once (BASEPATH . DIRECTORY_SEPARATOR . "php/conexao.php");
require_once (BASEPATH . DIRECTORY_SEPARATOR . "php/funcoes.php");
// criptografia das senhas
require_once (BASEPATH . DIRECTORY_SEPARATOR . "php/class/class.Bcrypt.php");
// upload
require_once (BASEPATH . DIRECTORY_SEPARATOR . "php/class/class.Upload.php");

//----------------------------------------------------
// DETALHES DO SISTEMA
//----------------------------------------------------

// nome do sistema
$nomeSistema    = func_pdo_get_data($con, "wd_config", "nome_sistema");

// nome da empresa
$nomeEmpresa    = func_pdo_get_data($con, "wd_config", "nome_empresa");

// cor do sistema
$corSistema = func_pdo_get_data($con, "wd_config", "cor_sistema");

// itens por página
$itensPorPagina = func_pdo_get_data($con, "wd_config", "itens_por_pagina");

// **************************************** //
// upload: dimensoes para corte das fotos
// **************************************** //
// largura máxima
$larguraMaxima  = func_pdo_get_data($con, "wd_config", "largura_maxima");

// altura máxima
$alturaMaxima   = func_pdo_get_data($con, "wd_config", "altura_maxima");

// tamanho arquivo
$tamanhoArquivo = func_pdo_get_data($con, "wd_config", "tamanho_arquivo");


?>
