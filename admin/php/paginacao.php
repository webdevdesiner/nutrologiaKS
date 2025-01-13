<?php
	// numero total de páginas
	$totalPaginas = ceil($total/$ipp);
   	$totalPaginas++;

	//echo "indice: ".$indice."  total: ".$totalPaginas."<br>";
	// url que será redirecionada
	$urlPagina = $_SERVER['PHP_SELF']."?pg=".$_GET['pg']."&ind=";

	// indice maior que 1
	if ( $indice > 1) {
		echo "<li><a href=".$urlPagina.($indice-1).">Anterior</a></li>";
   	} else {
        // chegou no primeiro, desabilita
    	echo "<li class='ls-disabled'><a href='#'>Anterior</a></li>";
   	}
	
	if(($indice - 4) < 1) {
        $anterior = 1;
	} else {
        $anterior = $indice - 4;
	}
	if(($indice + 5) > $totalPaginas) {
        $proximo = $totalPaginas;
	} else {
        $proximo = $indice + 5;
	}
	//echo "<br><br>indice: ". $indice ." indice-4: ".$anterior;

    // se proximo for menor totalPaginas
    if(($indice - 4) >= 2) {
        echo "<li><span class='ls-gap'>...</span></li>";
    }
	for($i_pg = $anterior; $i_pg < $proximo; $i_pg++) {
		if ($indice == ($i_pg)) {
			echo "<li class='ls-active'><a href='#'>$i_pg</a></li>";
		} else {
			echo "<li><a href={$urlPagina}{$i_pg}>$i_pg</a></li>";
		}
	}
    //echo " prox: ".$proximo;
   	if (( $indice + 1 ) < $totalPaginas) {
        // se proximo for menor totalPaginas
		if($proximo < $totalPaginas){
			echo "<li><span class='ls-gap'>...</span></li>";
		}
		echo "<li><a href=".$urlPagina.($indice+1).">Pr&oacute;xima</a></li>";
   	} else {
        // chegou no ultimo, desabilita
		echo "<li class='ls-disabled'><a href='#'>Pr&oacute;xima</a></li>";
   	}
?>
