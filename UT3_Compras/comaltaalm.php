<?php
    /*Alta de Almacenes (comaltaalm.php): dar de alta almacenes en diferentes localidades. El 
    número de almacén será un número secuencial. */
?>

<h2>Formulario de Alta de Almacenes</h2>

<?php
$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "comprasweb";

try 
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

<form method="post" action="">
    <label>LOCALIDAD :</label>
    <input type="text" name="localidad"><br><br>
    <input type="submit" value="Enviar">
</form>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // recoger datos del formulario
        $NUM_ALMACEN = obtenerIdAlmacen($conn);
        $LOCALIDAD = $_POST['localidad'];
        
        // preparar y ejecutar la inserción
        $sql = "INSERT INTO almacen (NUM_ALMACEN, LOCALIDAD) VALUES (:num_almacen, :localidad)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':num_almacen', $NUM_ALMACEN);
        $stmt->bindParam(':localidad', $LOCALIDAD);
        $stmt->execute();
        
        echo "<h3>ALMACEN DADO DE ALTA</h3>";
        echo "<p>NUM_ALMACEN: $NUM_ALMACEN</p>";
        echo "<p>LOCALIDAD: $LOCALIDAD</p>";
        
    }
}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}

$conn = null;

/********************************************************************************************/

function obtenerIdAlmacen($conn)
{
    $sql = "SELECT NUM_ALMACEN FROM almacen ORDER BY NUM_ALMACEN DESC LIMIT 1"; 
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $ultimoNum = $stmt->fetch(PDO::FETCH_ASSOC);
    $MaxNum = 0;

    if ($ultimoNum) 
    {
        $MaxNum = $ultimoNum['NUM_ALMACEN'];
    }

    return $MaxNum + 1;
}