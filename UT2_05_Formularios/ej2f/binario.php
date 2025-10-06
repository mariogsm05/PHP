<?php
    //Funci�n permite "limpiar campos" introducidos por los usuarios
    function limpiar_campo($campoformulario) 
    {
        $campoformulario = trim($campoformulario); 
        $campoformulario = stripslashes($campoformulario); 
        $campoformulario = htmlspecialchars($campoformulario);  

        return $campoformulario;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $decimal = limpiar_campo($_POST['decimal']);
    }

    function decimal_a_binario($decimal)
    {
        if ($decimal == "0")
        {
            return "0";
        }

        $binario = "";

        while ($decimal > 0)
        {
            $resto = $decimal % 2;
            $binario = $resto . $binario;
            $decimal = intdiv($decimal, 2);
        }
        
        return $binario;
    }

    echo "<h2>CONVERSOR DE DEC. A BIN.</h2>";
    echo "<label>NUMERO DECIMAL: </label>";
    echo "<input value=" . $decimal . ">";
    echo "<br>";
    echo "<br>";
    echo "<label>NUMERO BINARIO: </label>";
    echo "<input value=" . decimal_a_binario($decimal) . ">";
?>