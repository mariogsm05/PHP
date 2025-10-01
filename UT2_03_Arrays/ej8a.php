<HTML>
<HEAD><TITLE> EJ3A - TABLA NUMEROS BINARIOS</TITLE></HEAD>
<BODY>
<?php
    $alumnos = array("Mario" => 5, "Cesar" => 6, "Dani" => 7, "Carlos" => 8, "Javier" => 9);

    $maxNota = max($alumnos);
    $alumnoMaxNota = array_search($maxNota, $alumnos);

    echo "ALUMNO CON MAYOR NOTA : <br>";
    echo "<br>Es " , $alumnoMaxNota , " con un " , $maxNota;

    $minNota = min($alumnos);
    $alumnoMinNota = array_search($minNota, $alumnos);

    echo "<br><br>ALUMNO CON MENOR NOTA : <br>";
    echo "<br>Es " , $alumnoMinNota , " con un " , $minNota;

    $mediaNotas = array_sum($alumnos) / count($alumnos);
    echo "<br><br>MEDIA DE NOTAS DE LOS ALUMNOS :<br>";
    echo "<br>La media de las notas es de : " , round($mediaNotas, 2);
?>
</BODY>
</HTML>