<?php
function limpa($string){
    $var = trim($string);
    $var = addslashes($var);
    return $var;
}

//**********************************************************
//Função para limitar tamanho do texto
//**********************************************************
function func_limita_caracteres($texto, $limite, $quebra = true) {
    $tamanho = mb_strlen($texto, "UTF-8");

    // Verifica se o tamanho do texto é menor ou igual ao limite
    if ($tamanho <= $limite) {
        $novo_texto = $texto;
        // Se o tamanho do texto for maior que o limite
    } else {
        // Verifica a opção de quebrar o texto
        if ($quebra == true) {
            $novo_texto = trim(mb_substr($texto, 0, $limite, "UTF-8")) . '...';
            // Se não, corta $texto na última palavra antes do limite
        } else {
            // Localiza o útlimo espaço antes de $limite
            $ultimo_espaco = strrpos(mb_substr($texto, 0, $limite, "UTF-8"), ' ');
            // Corta o $texto até a posição localizada
            $novo_texto = trim(mb_substr($texto, 0, $ultimo_espaco, "UTF-8")) . '...';
        }
    }

    // Retorna o valor formatado
    return $novo_texto;
}

//**********************************************************
//Função para retornar o nome do mês - padrão brasileiro
//**********************************************************
function nomeMes($mes, $maiusculo = "S", $amigavel = "N" ){
    switch ($mes) {
        case "01":    $mes = "Janeiro";     break;
        case "02":    $mes = "Fevereiro";   break;
        case "03":    $mes = "Março";       break;
        case "04":    $mes = "Abril";       break;
        case "05":    $mes = "Maio";        break;
        case "06":    $mes = "Junho";       break;
        case "07":    $mes = "Julho";       break;
        case "08":    $mes = "Agosto";      break;
        case "09":    $mes = "Setembro";    break;
        case "10":    $mes = "Outubro";     break;
        case "11":    $mes = "Novembro";    break;
        case "12":    $mes = "Dezembro";    break;
    }
    if($maiusculo == "S") {
        $mes = mb_strtoupper($mes, "UTF-8");
    }else if($maiusculo == "N"){
        $mes = mb_strtolower($mes, "UTF-8");
    }

    if($amigavel == "S"){
        $mes = func_url_amigavel($mes);
    }
    
    return $mes;
}

function partesDaData($data, $soDia=false, $soMes=false, $soAno = false){
    $data = explode("-", $data);
    $dia = $data[2];
    $mes = $data[1];
    $ano = $data[0];
    if($soDia){ return $dia; }
    if($soMes){ return nomeMes($mes, "P"); }
    if($soAno){ return $ano; }
}

//**********************************************************
//Função para formatar data p padrao americano
//**********************************************************
function formatarData($data) {
    $rData = implode("-", array_reverse(explode("/", trim($data))));
    return $rData;
}

//**********************************************************
//Função para exibir data no formato brasileiro
//**********************************************************
function exibirData($data, $simbolo = "/", $porExtenso = "N") {
    if ($porExtenso == "N") {
        $rData = explode("-", $data);
        $rData = $rData[2] . $simbolo . $rData[1] . $simbolo . $rData[0];
        return $rData;
    } else {
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        // quarta-feira, 30 de setembro de 2015
        //return strftime('%A, %d de %B de %Y', strtotime($data));
        // 30 de setembro de 2015
        return utf8_encode( strftime('%d de %B', strtotime($data) ) );
    }
}

//**********************************************************
//Função para exibir data e hora no formato brasileiro
//**********************************************************
function exibirDataHora($datetime) {
    $Data = substr(trim($datetime), 0, 10);
    $Hora = substr(trim($datetime), 11, strlen($datetime));
    $rDataTime = exibirData($Data) . " às " . $Hora;
    return $rDataTime;
}

//**********************************************************
//Função para exibir somente data de datetime
//**********************************************************
function exibirSoData($datetime) {
    $Data = substr(trim($datetime), 0, 10);
    $rData = exibirData($Data);
    return $rData;
}

//**********************************************************
//Função para tratar nome de arquivo(s)
//**********************************************************
function tratar_nome_arquivo($string) {
    // pegando a extensao do arquivo
    $partes = explode(".", $string);
    $extensao = $partes[count($partes) - 1];
    // somente o nome do arquivo
    $nome = preg_replace('/\.[^.]*$/', '', $string);
    // removendo simbolos, acentos etc
    $a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýýþÿŔŕ?';
    $b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuuyybyRr-';
    $nome = strtr($nome, utf8_decode($a), $b);
    $nome = str_replace(".", "-", $nome);
    $nome = preg_replace("/[^0-9a-zA-Z\.]+/", '-', $nome);
    $nome = sha1($nome . time()) . "." . $extensao;
    return utf8_decode(strtolower($nome));
}

//**********************************************************
//Função para tratar nome de arquivo(s)
//**********************************************************
function tratar_nome_arquivo_sem_sha1($string) {
    // pegando a extensao do arquivo
    $partes = explode(".", $string);
    $extensao = $partes[count($partes) - 1];
    // somente o nome do arquivo
    $nome = preg_replace('/\.[^.]*$/', '', $string);
    // removendo simbolos, acentos etc
    $a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýýþÿŔŕ?';
    $b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuuyybyRr-';
    $nome = strtr($nome, utf8_decode($a), $b);
    $nome = str_replace(".", "-", $nome);
    $nome = preg_replace("/[^0-9a-zA-Z\.]+/", '-', $nome);
    $nome = $nome . "." . $extensao;
    return utf8_decode(strtolower($nome));
}

//**********************************************************
//Função para criar url amigavel
//**********************************************************
function func_url_amigavel($string) {
    $string = utf8_decode(mb_strtolower($string, "UTF-8"));
    $a = utf8_decode('ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýýþÿŔŕ?');
    $b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuuyybyRr-';

    $string = strtr($string, $a, $b);
    $string = str_replace(".", "", $string);
    $string = preg_replace("/[^0-9a-zA-Z\.]+/", '-', $string);
    return $string;
}

//**********************************************************
//Função para excluir arquivo(s)
//**********************************************************
function func_excluir_arquivo($arquivo) {
    if (file_exists($arquivo)) {
        unlink($arquivo);
        return true;
    } else {
        return false;
    }
}

//**********************************************************
//Função para excluir diretório
//**********************************************************
function func_excluir_diretorio($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir . "/" . $object) == "dir")
                    rrmdir($dir . "/" . $object);
                else
                    unlink($dir . "/" . $object);
            }
        }
        reset($objects);
        rmdir($dir);
    }
}

//**********************************************************
//Função para proteger os dados do formulário
//**********************************************************
function sanitize($string, $trim = false, $end_char = '&#8230;', $int = false, $str = false) {
    //$string = filter_var($string, FILTER_SANITIZE_STRING);
    $string = filter_var($string, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $string = trim($string);
    $string = stripslashes($string);
    $string = strip_tags($string);
    $string = str_replace(array('‘', '’', '“', '”'), array("'", "'", '"', '"'), $string);

    if ($trim) {
        if (strlen($string) < $trim) {
            return $string;
        }

        $string = preg_replace("/\s+/", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $string));

        if (strlen($string) <= $trim) {
            return $string;
        }

        $out = "";
        foreach (explode(' ', trim($string)) as $val) {
            $out .= $val . ' ';

            if (strlen($out) >= $trim) {
                $out = trim($out);
                return (strlen($out) == strlen($string)) ? $out : $out . $end_char;
            }
        }

        //$string = substr($string, 0, $trim);
    }
    if ($int)
        $string = preg_replace("/[^0-9\s]/", "", $string);
    if ($str)
        $string = preg_replace("/[^a-zA-Z\s]/", "", $string);

    return $string;
}

//**********************************************************
//Função para buscar dados em uma tabela
//**********************************************************
function func_pdo_select($con, $table, $campos = "*", $where = "", $groupBy = "", $orderBy = "", $limit = "", $join = "") {

    if ($join != "") {
        $sql = 'SELECT ' . $campos . ' FROM ' . $table;
        $sql .= ($where == "" ? "" : (" WHERE " . $where));
        $sql .= $join;
        $sql .= ($groupBy == "" ? "" : (" GROUP BY " . $groupBy));
        $sql .= ($orderBy == "" ? "" : (" ORDER BY " . $orderBy));
        $sql .= ($limit == "" ? "" : (" LIMIT " . $limit));
    } else {
        $sql = "SELECT " . $campos . " FROM " . $table;
        $sql .= ($where == "" ? "" : (" WHERE " . $where));
        $sql .= ($groupBy == "" ? "" : (" GROUP BY " . $groupBy));
        $sql .= ($orderBy == "" ? "" : (" ORDER BY " . $orderBy));
        $sql .= ($limit == "" ? "" : (" LIMIT " . $limit));
    }

    $sth = $con->prepare($sql);
    $sth->execute(array($where));
    //$rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    //$res = $con->query($sql) or die($con->error);
    return $sth;
}

//**********************************************************
//Função para retornar total de linhas de uma tabela
//**********************************************************
function func_pdo_count($con, $table, $where = "", $array = "") {
    $sql = "SELECT count(*) as total FROM " . $table;
    $sql .= ($where == "" ? "" : $where);

    $sth = $con->prepare($sql);

    if ($where == "") {
        try {
            $sth->execute();
        } catch (PDOException $e) {
            echo '<div class="ls-alert-danger ls-dismissable"><span data-ls-module="dismiss" class="ls-dismiss">&times;</span><strong>Erro!</strong> ' . $e->getMessage() . '</div>';
        }
    } else {

        if ($array == "") {
            try {
                $sth->execute();
            } catch (PDOException $e) {
                echo '<div class="ls-alert-danger ls-dismissable"><span data-ls-module="dismiss" class="ls-dismiss">&times;</span><strong>Erro!</strong> ' . $e->getMessage() . '</div>';
            }
        } else {
            try {
                $sth->execute($array);
            } catch (PDOException $e) {
                echo '<div class="ls-alert-danger ls-dismissable"><span data-ls-module="dismiss" class="ls-dismiss">&times;</span><strong>Erro!</strong> ' . $e->getMessage() . '</div>';
            }
        }
    }
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    return $row['total'];
}

//**********************************************************
//Função para retornar um campo especifico
//**********************************************************
function func_pdo_get_data($con, $table, $campo = "*", $where = ""){
    $sql  = "SELECT ".$campo." FROM ".$table;
    $sql .= ($where == "" ? "" : (" WHERE ".$where));
    $sth  = $con->prepare($sql);
    $sth->execute();
    $r = $sth->fetch(PDO::FETCH_ASSOC);
    return $r[$campo];
}

//**********************************************************
//Função para retornar o ip de acesso
//**********************************************************
function getIp() {
    if (!empty($_SERVER['REMOTE_ADDR'])) {
        $ip = $_SERVER['REMOTE_ADDR'];
    } elseif (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED'];
    } elseif (!empty($_SERVER['HTTP_FORWARDED'])) {
        $ip = $_SERVER['HTTP_FORWARDED'];
    } elseif (!empty($_SERVER['HTTP_X_COMING_FROM'])) {
        $ip = $_SERVER['HTTP_X_COMING_FROM'];
    } elseif (!empty($_SERVER['HTTP_COMING_FROM'])) {
        $ip = $_SERVER['HTTP_COMING_FROM'];
    } else {
        $ip = NULL;
    }
    return $ip;
}

function byte_convert($size) {
    $size = $size / 1000;

    # size smaller then 1kb
    if ($size < 1024) return $size . ' KB';
    # size smaller then 1mb
    if ($size < 1048576) return sprintf("%4.1f MB", $size/1024);
    # size smaller then 1gb
    if ($size < 1073741824) return sprintf("%4.1f GB", $size/1048576);
    # size smaller then 1tb
    if ($size < 1099511627776) return sprintf("%4.1f TB", $size/1073741824);
    # size larger then 1tb
    else return sprintf("%4.1f PB", $size/1073741824);
}
?>