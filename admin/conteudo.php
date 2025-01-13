<?php
if( isset($_GET['pg']) && !empty($_GET['pg']) )  {
    $pagina = $_GET['pg'];
    $modulo = current(explode("_", $pagina));
    $arquivo = DIR_MODS . $modulo . DIRECTORY_SEPARATOR . $pagina;
} else{
	$pagina = ""; $modulo = ""; $arquivo = "";
}

if(file_exists($arquivo.'.html')){
	include ($arquivo.'.html');
}
elseif(file_exists($arquivo.'.php')){
	include ($arquivo.'.php');
}else{
	include('principal.php');
}
?>
