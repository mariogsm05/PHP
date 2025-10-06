<?php
    //Funci�n permite "limpiar campos" introducidos por los usuarios
    function limpiar_campo($campoformulario) 
    {
        $campoformulario = trim($campoformulario); 
        $campoformulario = stripslashes($campoformulario); 
        $campoformulario = htmlspecialchars($campoformulario);  

        return $campoformulario;
    }

    echo "<h2>CALCULADORA</h2>";

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $op1 = limpiar_campo($_POST["operador1"]);
        $op2 = limpiar_campo($_POST["operador2"]);
        $op = $_POST["operacion"];

        switch ($op)
        {
            case "suma":
                echo "<b>RESULTADO: $op1 + $op2 = " . ($op1 + $op2) . "</b>";
                break;
            case "resta":
                echo "<b>RESULTADO: $op1 - $op2 = " . ($op1 - $op2) . "</b>";
                break;
            case "multiplicacion":
                echo "<b>RESULTADO: $op1 * $op2 = " . ($op1 * $op2) . "</b>";
                break;
            case "division":
                if ($op2 != 0) 
                {
                    echo "<b>RESULTADO: $op1 / $op2 = " . ($op1 / $op2) . "</b>";
                } 
                else 
                {
                    echo "<b>Error: No se puede dividir por cero.</b>";
                }
                    break;
        }
    }
?>