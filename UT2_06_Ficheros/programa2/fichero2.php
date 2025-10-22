<?php
    function limpiar_campo($campoformulario) 
    {
        $campoformulario = trim($campoformulario); 
        $campoformulario = stripslashes($campoformulario); 
        $campoformulario = htmlspecialchars($campoformulario);  

        return $campoformulario;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $nombre = limpiar_campo($_POST['nombre']);
        $apellido1 = limpiar_campo($_POST['apellido1']);
        $apellido2 = limpiar_campo($_POST['apellido2']);
        $fechaN = limpiar_campo($_POST['fechaN']);
        $localidad = limpiar_campo($_POST['localidad']);

        $linea = $nombre . "##" . $apellido1 . "##" . $apellido2 . "##" . $fechaN  . "##" . $localidad . "\n";

        $archivo = fopen("../files/alumnos2.txt", "a");
        if ($archivo)
        {
            fwrite($archivo, $linea);
            fclose($archivo);
            echo "<h3>Datos guardados correctamente en alumnos2.txt</h3>";
            echo "<a href='fichero2.html'>Volver al formulario</a>";
        } 
        else 
        {
            echo "<h3>ERROR!!\t\tError al abrir el fichero alumnos2.txt</h3>";
        }
    }
?>