<HTML>
<HEAD><TITLE> EJ3A - TABLA NUMEROS BINARIOS</TITLE></HEAD>
<BODY>
<?php
    $binarios = array();
    $octeto = array();

    for ($i = 0; $i < 20; $i++)
    {
        $binario = "";
        $num = $i;

        if ($num == 0)
        {
            $binario = 0;
        }
        else
        {
            while ($num > 0)
            {
                $resto = $num % 2;
                $binario = $resto . $binario;
                $num = intdiv($num, 2);
            }
        }

        $binarios[$i] = $binario;

        $octal = "";
        $num = $i;

        if ($num == 0)
        {
            $octal = 0;
        }
        else
        {
            while ($num > 0)
            {
                $resto = $num % 8;
                $octal = $resto . $octal;
                $num = intdiv($num, 8);
            }
        }

        $octeto[$i] = $octal;
    }

    echo "<h2>TABLA CON 20 NUMEROS BINARIOS Y OCTALES</h2>";

    echo "<table border= 1>";
    echo "<tr><th>INDICE</th><th>BINARIO</th><th>OCTETO</th></tr>";
    for ($i = 0; $i < 20; $i++)
    {
        echo "<tr>";
        echo "<th>$i</th>";
        echo "<th>$binarios[$i]</th>";
        echo "<th>$octeto[$i]</th>";
        echo "</tr>";
    }
    echo "</table>";
?>
</BODY>
</HTML>