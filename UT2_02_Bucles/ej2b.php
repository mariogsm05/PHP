<HTML>
<HEAD><TITLE>EJ2B - Conversor Decimal a base n</TITLE></HEAD>
<BODY>
<?php
    $num="48";
    $base="2";
    settype($num, "integer");
    settype($base, "integer");
    $resultado = "";

    if ($base >= 2 && $base <= 9)
    {
        while ($num > 0)
        {
            $resto = $num % $base;
            $resultado = $resultado . $resto;
            $num = intdiv($num, $base);
        }
    }

    if ($base == 2)
    {
        echo str_pad(strrev($resultado), 8, "0", STR_PAD_LEFT);
    }
    else
    {
        echo strrev($resultado);
    }
?>
</BODY>
</HTML>