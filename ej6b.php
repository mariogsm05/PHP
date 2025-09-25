<HTML>
<HEAD><TITLE> EJ6B – Factorial</TITLE></HEAD>
<BODY>
<?php
    $num="5";
    $restador="5";
    $resultado="1";

    echo $num . "! = ";
    for ($i = 0; $i < $num; $i++)
    {
        echo $restador . " X ";
        $resultado = $resultado * $restador;
        $restador = $restador - 1;
    }
    echo " = " . $resultado;
?>
</BODY>
</HTML>