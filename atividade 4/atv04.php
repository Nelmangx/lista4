<?php 
    //Gerador da tabuáda.
    $numero = $_POST["numero"];
    $multiplicando = 0;
    do {
        echo "$numero X $multiplicando = ".$numero * $multiplicando. "<br>";
        $multiplicando++;
    } while ($multiplicando <= 10)
?>