<HTML>
<HEAD><TITLE> EJ3A - TABLA NUMEROS BINARIOS</TITLE></HEAD>
<BODY>
<?php
    $primerArray = array("Base de Datos", "Entorno de Desarrollo", "Programacion");
    $segundoArray = array("Sistemas Informaticos", "FOL", "Mecanizado");
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

    for ($i = 0; $i < count($arrayDeTodos); $i++)
    {
        echo "<br>" . $arrayDeTodos[$i];
    }

    echo "<h3>SEGUNDA FORMA CON ARRAY_MERGE</h3>";

    print_r(array_merge($primerArray, $segundoArray, $tercerArray));

    echo "<h3>TERCERA FORMA CON ARRAY_PUSH</h3>";
    
    $a = array();

    array_push($a, $primerArray, $segundoArray, $tercerArray);

    print_r($a);
?>
</BODY>
</HTML>