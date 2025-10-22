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

        $nombre = str_pad(substr($nombre, 0, 40), 40, " ", STR_PAD_RIGHT);
        $apellido1 = str_pad(substr($apellido1, 0, 41), 41, " ", STR_PAD_RIGHT);
        $apellido2 = str_pad(substr($apellido2, 0, 41), 41, " ", STR_PAD_RIGHT);
        $fechaN = str_pad(substr($fechaN, 0, 11), 11, " ", STR_PAD_RIGHT);
        $localidad = str_pad(substr($localidad, 0, 27), 27, " ", STR_PAD_RIGHT);

        $linea = $nombre . $apellido1 . $apellido2 . $fechaN . $localidad . "\n";

        $archivo = fopen("../files/alumnos1.txt", "a");
        if ($archivo)
        {
            fwrite($archivo, $linea);
            fclose($archivo);
            echo "<h3>Datos guardados correctamente en alumnos1.txt</h3>";
            echo "<a href='fichero1.html'>Volver al formulario</a>";
        } 
        else 
        {
            echo "<h3>ERROR!!\t\tError al abrir el fichero alumnos1.txt</h3>";
        }
    }
?>