<HTML>
<HEAD><TITLE> EJ3A - TABLA NUMEROS BINARIOS</TITLE></HEAD>
<BODY>
<?php
    $primerArray = array("Base de Datos", "Entorno de Desarrollo", "Programacion");
    $segundoArray = array("Sistemas Informaticos", "FOL", "Mecanizado");
    $segundoArray = array_diff($segundoArray, array("Mecanizado"));
    $tercerArray = array("Desarrollo Web ES", "Desarrollo Web EC", "Despliegue", "Desarrollo Interfaces", "Ingles");

    $arrayDeTodos = array();

    for ($i = 0; $i < count($primerArray); $i++)
    {
        $arrayDeTodos[] = $primerArray[$i];
    }

    for ($i = 0; $i < count($segundoArray); $i++)
    {
        $arrayDeTodos[] = $segundoArray[$i];
    }

    for ($i = 0; $i < count($tercerArray); $i++)
    {
        $arrayDeTodos[] = $tercerArray[$i];
    }

    echo "<h3>PRIMERA FORMA SIN FUNCIONES</h3>";

    for ($i = count($arrayDeTodos) - 1; $i >= 0 ; $i--)
    {
        echo "<br>" . $arrayDeTodos[$i];
    }
?>
</BODY>
</HTML>