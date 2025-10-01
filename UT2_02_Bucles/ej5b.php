<HTML>
<HEAD><TITLE> EJ5B – Tabla Multiplicar</TITLE></HEAD>
<BODY>
<?php
    $num="8";
    settype ($num, "integer");

    echo "<h2>TABLA DEL ". $num ."</h2>";

    echo "<table border= 1>";
    echo "<tr><th>MULTIPLICACION</th><th>RESULTADO</th></tr>";
    for ($i = 1; $i < 11; $i++)
    {
        echo "<tr>";
        echo "<th>" . $i . " X " . $num . "</th>";
        echo "<th>" . ($i * $num) . "</th>";
        echo "</tr>";
    }
    echo "</table>";
?>
</BODY>
</HTML>