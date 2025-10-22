<?php
    //Funci�n permite "limpiar campos" introducidos por los usuarios
    function limpiar_campo($campoformulario) 
    {
        $campoformulario = trim($campoformulario); 
        $campoformulario = stripslashes($campoformulario); 
        $campoformulario = htmlspecialchars($campoformulario);  

        return $campoformulario;
    }

    function cambio_a_binario($decimal)
    {
        if ($decimal == "0")
        {
            return "0";
        }
        else
        {
            return decbin($decimal);
        }
    }

    function cambio_a_octal($decimal)
    {
        if ($decimal == "0")
        {
            return "0";
        }
        else
        {
            return decoct($decimal);
        }
    }

    function cambio_a_hexadecimal($decimal)
    {
        if ($decimal == "0")
        {
            return "0";
        }
        else
        {
            return dechex($decimal);
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $decimal = limpiar_campo($_POST['decimal']);
        $opcion = limpiar_campo($_POST['opcion']);

        if (is_numeric($decimal))
        {
            echo "<label>Numero Decimal: </label>";
            echo "<input type='text' value='$decimal'><br><br>";

            echo "<table border='1'>";

            switch ($opcion)
            {
                case 'binario':
                    echo "<tr><td>Binario</td><td>" . cambio_a_binario($decimal) . "</td></tr>";
                    break;
                case 'octal':
                    echo "<tr><td>Octal</td><td>" . cambio_a_octal($decimal) . "</td></tr>";
                    break;
                case 'hexadecimal':
                    echo "<tr><td>Hexadecimal</td><td>" . cambio_a_hexadecimal($decimal) . "</td></tr>";
                    break;
                case 'todos':
                    echo "<tr><td>Binario</td><td>" . cambio_a_binario($decimal) . "</td></tr>";
                    echo "<tr><td>Octal</td><td>" . cambio_a_octal($decimal) . "</td></tr>";
                    echo "<tr><td>Hexadecimal</td><td>" . cambio_a_hexadecimal($decimal) . "</td></tr>";
                    break;
            }

            echo "</table>";
        }
        else
        {
            echo "<p>Introduce un NUMERO!!.</p>";
        }
    }
?>