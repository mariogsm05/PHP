<HTML>
<HEAD><TITLE> EJ1B - Conversor decimal a binario</TITLE></HEAD>
<BODY>
<?php
    $num="168";
    settype($num, "integer");

    $binario = "";

    while ($num > 0)
    {
        $resto = $num % 2;
        $binario = $binario . $resto;
        $num = intdiv($num, 2);
    }

    echo strrev($binario);
?>
</BODY>
</HTML>