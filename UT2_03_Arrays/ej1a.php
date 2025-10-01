<HTML>
<HEAD><TITLE> EJ1A - TABLA NUMEROS IMPARES</TITLE></HEAD>
<BODY>
<?php
    $nums = array();
    $sumador = 0;

    for ($i = 0; $i < 20; $i++)
    {
        $nums[$i] = $i * 2 + 1;
    }

    echo "<h2>TABLA CON LA SUMA DE LOS PRIMERO 20 NUMERO IMPARES</h2>";

    echo "<table border= 1>";
    echo "<tr><th>INDICE</th><th>VALOR</th><th>Suma</th></tr>";
    for ($i = 0; $i < 20; $i++)
    {
        $sumador = $sumador + $nums[$i];

        echo "<tr>";
        echo "<th>$i</th>";
        echo "<th>$nums[$i]</th>";
        echo "<th>$sumador</th>";
        echo "</tr>";
    }
    echo "</table>";
?>
</BODY>
</HTML>