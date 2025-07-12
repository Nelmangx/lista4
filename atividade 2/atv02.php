<?php
    //Contagem regressiva com while.
    $numero = $_POST["numero"];
    $i = 0;
    while($numero > 0) {
        $numero --;
        echo $numero;
        
    }
?>