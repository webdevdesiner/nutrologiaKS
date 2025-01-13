<?php
   unset($_SESSION["apps_20032019"]);
   //@header("Location: login.php");
   // obtendo a página anterior
   $url_ant = $_SERVER['HTTP_REFERER'];
   // redirecionando imediatamente
   echo "<meta http-equiv=\"refresh\" content=\"0;url=$url_ant\" />";
?>