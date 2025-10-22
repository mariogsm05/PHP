<?php

    $contador = 0;
    $archivo = fopen("../files/alumnos1.txt", "r"); //r para leer y colocarnos en el principio del fichero

    echo "<table border=1>";
    echo "<td>NOMBRE</td>";
    echo "<td>PRIMER APELLIDO</td>";
    echo "<td>SEGUNDO APELLIDO</td>";
    echo "<td>F. NACIMIENTO</td>";
    echo "<td>LOCALIDAD</td>";

    while (!feof($archivo))
    {
        $texto = fgets($archivo);
        
        $nombre = substr($texto, 0, 40);
        $apellido1 = substr($texto, 40, 41);
        $apellido2 = substr($texto, 81, 41);
        $fechaN = substr($texto, 122, 10);
        $localidad = substr($texto, 132, 27);

        echo "<tr>";
        echo "<td>" . $nombre . "</td>";
        echo "<td>" . $apellido1 . "</td>";
        echo "<td>" . $apellido2 . "</td>";
        echo "<td>" . $fechaN . "</td>";
        echo "<td>" . $localidad . "</td>";
        echo "</tr>";

        $contador++;
    }

    echo "SE HAN IMPRIMIDO UN TOTAL DE " . $contador . " FILAS"
?>