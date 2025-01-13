<?php
    $tipo_conexao = $_SERVER['HTTP_HOST'];

    if (($tipo_conexao == 'localhost') || ($tipo_conexao == '127.0.0.1')){
        // para uso local
        $DB_host  = "localhost";
        $DB_login = "root";
        $DB_pass  = "";
        $DB_db    = "iberika_pronutry";
    }else{
        // para uso externo
        $DB_host  = "mysql.pronutry.com.br";
        $DB_login = "pronutry";
        $DB_pass  = "bDM3SqL2019";
        $DB_db    = "pronutry";
    }

    try{
        $con = new PDO("mysql:host=$DB_host;dbname=$DB_db;charset=UTF8", $DB_login, $DB_pass);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e){
        echo "Falha ao conectar ao banco: (" . $e->getCode() . ") " . $e->getMessage();
    }

?>
