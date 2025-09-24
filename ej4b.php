<HTML>
<HEAD><TITLE> EJ4B – Tabla Multiplicar</TITLE></HEAD>
<BODY>
<?php
    $num="8";

    echo "<h2>TABLA DEL ". $num ."</h2>";

    for ($i = 1; $i < 11; $i++)
    {
        echo $i . " X " . $num . " = " . ($i * $num);
        echo "<br>";
    }
?>
</BODY>
</HTML>