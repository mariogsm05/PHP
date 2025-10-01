<HTML>
<HEAD><TITLE> EJ3A - TABLA NUMEROS BINARIOS</TITLE></HEAD>
<BODY>
<?php
    $alumnos = array("Mario" => 20, "Cesar" => 19, "Dani" => 20, "Carlos" => 32, "Javier" => 21);

    echo "MOSTRAT ARRAY CON BUCLE : <br>";
    foreach ($alumnos as $nombre => $edad)
    {
        echo "<br>NOMBRE : " , $nombre , "  " , "EDAD : " , $edad;
    }


    echo "<br><br>SEGUNDA POSICION DEL ARRAY : <br>";
    reset($alumnos);
    next($alumnos);
    echo key($alumnos) , " => " , current($alumnos);

    echo "<br><br>AVANZAMOS POSICION DEL ARRAY : <br>";
    next($alumnos);
    echo key($alumnos) , " => " , current($alumnos);

    echo "<br><br>AVANZAMOS HASTA LA POSICION FINAL DEL ARRAY : <br>";
    end($alumnos);
    echo key($alumnos) , " => " , current($alumnos);

    echo "<br><br>ORDENAR DE MENOR A MENOR POR EDAD : <br>";
    asort($alumnos);

    foreach ($alumnos as $nombre => $edad)
    {
        echo "<br>NOMBRE : " , $nombre , "  " , "EDAD : " , $edad;
    }
?>
</BODY>
</HTML>