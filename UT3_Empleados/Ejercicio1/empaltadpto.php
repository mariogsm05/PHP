<?php

    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname = "empleados";

    try 
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        function limpiar_campo($campoformulario) 
        {
            $campoformulario = trim($campoformulario); 
            $campoformulario = stripslashes($campoformulario); 
            $campoformulario = htmlspecialchars($campoformulario);  

            return $campoformulario;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $nombre_dpto = limpiar_campo($_POST['nombre_dpto']);
            $cod_dpto = obtenerIdDpto($conn);

            $sql = "INSERT INTO departamento (cod_dpto, nombre_dpto) VALUES (:cod_dpto, :nombre_dpto)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':cod_dpto', $cod_dpto);
            $stmt->bindParam(':nombre_dpto', $nombre_dpto);
            $stmt->execute();

            $conn->commit();
            echo "<h3>DEPARTAMENTO DADO DE ALTA</h3>";
            echo "<p>CODIGO DEPARTAMENTO: $cod_dpto</p>";
            echo "<p>NOMBRE DEPARTAMENTO: $nombre_dpto</p>";
        }
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;

/********************************************************************************************/

    function obtenerIdDpto($conn)
    {
        $sql = "SELECT cod_dpto FROM departamento ORDER BY cod_dpto DESC LIMIT 1"; 
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $ultimoCod = $stmt->fetch(PDO::FETCH_ASSOC);
        $MaxCod = 0;

        if ($ultimoCod)
        {
            foreach ($ultimoCod as $valor) 
            {
                $MaxCod = intval(substr($valor, 1));
            }
        }

        $MaxCod = $MaxCod + 1;

        return "D" . str_pad($MaxCod, 3 , "0", STR_PAD_LEFT);
    }
?>