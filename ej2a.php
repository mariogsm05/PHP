<HTML>
<HEAD><TITLE> EJ1A - TABLA NUMEROS IMPARES</TITLE></HEAD>
<BODY>
<?php
    $nums = array();
    $sumador = 0;

    $contadorPares = 0;
    $sumPares = 0;
    $mediaPares = 0;

    $contadorImpares = 0;
    $sumImpares = 0;
    $mediaImpares = 0;

    for ($i = 0; $i < 20; $i++)
    {
        $nums[$i] = $i * 2 + 1;
    }

    for($j = 0; $j < count($nums); $j = $j + 2)
    {
        if ($j % 2 == 0)
        {
            $sumPares = $sumPares + $nums[$j];
            $contadorPares++;
        }
    }

    $mediaPares = $sumPares / $contadorPares;

    for($k = 1; $k < count($nums); $k = $k + 2)
    {
        $sumImpares = $sumImpares + $nums[$k];
        $contadorImpares++;
    }

    $mediaImpares = $sumImpares / $contadorImpares;

    echo "<h2>TABLA CON LA SUMA DE LOS PRIMERO 20 NUMERO IMPARES</h2>";

    echo "<table border= 1>";
    echo "<tr><th>INDICE</th><th>VALOR</th><th>SUMA</th><th>MEDIA PARES</th><th>MEDIA IMPARES</th></tr>";
    for ($i = 0; $i < 20; $i++)
    {

        $sumador = $sumador + $nums[$i];

        echo "<tr>";
        echo "<th>$i</th>";
        echo "<th>{$nums[$i]}</th>";
        echo "<th>$sumador</th>";
        echo "<th>$mediaPares</th>";
        echo "<th>$mediaImpares</th>";
        echo "</tr>";
    }
    echo "</table>";
?>
</BODY>
</HTML>