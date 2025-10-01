<HTML>
<h1>EJERCICIO 2</h1>
<BODY>
<?php
    $ip="192.18.16.204";

    $p1 = strpos($ip, ".");
    $p2 = strpos($ip, ".", $p1 + 1);
    $p3 = strpos($ip, ".", $p2 + 1);

    // Extraer los octetos
    $oct1 = substr($ip, 0, $p1);
    $oct2 = substr($ip, $p1 + 1, $p2 - $p1 - 1);
    $oct3 = substr($ip, $p2 + 1, $p3 - $p2 - 1);
    $oct4 = substr($ip, $p3 + 1);

    // Mostrar los octetos
    echo "1er octeto : " . $oct1;
    echo "<br>2o octeto : " . $oct2;
    echo "<br>3er octeto : " . $oct3;
    echo "<br>4o octeto : " . $oct4;

    echo "<h2>NUMERO BINARIO</h2>"; //La funcion decbin pasa de decimal a binario
    echo decbin($oct1) . ".";
    echo decbin($oct2) . ".";
    echo decbin($oct3) . ".";
    echo decbin($oct4);
?>
</BODY>
</HTML>