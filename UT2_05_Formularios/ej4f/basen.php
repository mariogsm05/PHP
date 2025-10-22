<?php
    //Funci�n permite "limpiar campos" introducidos por los usuarios
    function limpiar_campo($campoformulario) 
    {
        $campoformulario = trim($campoformulario); 
        $campoformulario = stripslashes($campoformulario); 
        $campoformulario = htmlspecialchars($campoformulario);  

        return $campoformulario;
    }

    function convertirBase($numero, $baseOrigen, $baseDestino)
    {
        $decimal = base_convert($numero, $baseOrigen, 10);
        $resultado = base_convert($decimal, 10, $baseDestino);
        return $resultado;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $entrada = limpiar_campo($_POST['numero']);
        $nuevaBase = limpiar_campo($_POST['base']);

        //strpos -> cuenta las posiciones que hay hasta llegar a "/"
        if (strpos($entrada, "/") !== false) // Se espera el formato "numero/base"
        {
            //explode -> hace que $numero sea la parte de delante del / y $baseOrigen la parte de despues (Los separa como un ARRAY)
            list($numero, $baseOrigen) = explode("/", $entrada);
            $numero = limpiar_campo($numero);
            $baseOrigen = intval($baseOrigen);
        } 
        else 
        {
            echo "<p>Error: Debes introducir el número en el formato número/base (ej: 200/10)</p>";
            exit;
        }

        //Validar Bases
        if ($baseOrigen < 2 || $baseOrigen > 36 || $nuevaBase < 2 || $nuevaBase > 36) 
        {
            echo "<p>Error: las bases deben estar entre 2 y 36.</p>";
            exit;
        }

        $resultado = convertirBase($numero, $baseOrigen, $nuevaBase);

        echo "<h3>Número $numero en base $baseOrigen = $resultado en base $nuevaBase</h3>";
    }
?>