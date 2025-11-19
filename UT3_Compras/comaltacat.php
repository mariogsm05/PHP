<?php
    /*Alta de Categorías (comaltacat.php): dar de alta categorías de productos. El id_categoria 
    será un campo con el formato C-xxx donde xxx será un número secuencial que comienza en 1 
    completándose con 0 hasta completar el formato (este campo será calculado desde PHP).*/
?>

<h2>Formulario de Alta de Categorias</h2>

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
    <label>NOMBRE:</label>
    <input type="text" name="nombre">
    <input type="submit" value="Enviar">
</form>

<?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // recoger datos del formulario
        $ID_CATEGORIA = obtenerIdCategoria($conn);
        $NOMBRE = $_POST['nombre'];
        
        // preparar y ejecutar la inserción
        $sql = "INSERT INTO categoria (ID_CATEGORIA, NOMBRE) VALUES (:id_categoria, :nombre)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_categoria', $ID_CATEGORIA);
        $stmt->bindParam(':nombre', $NOMBRE);
        $stmt->execute();
        
        echo "<h3>CATEGORIA DADA DE ALTA</h3>";
        echo "<p>ID_CATEGORIA: $ID_CATEGORIA</p>";
        echo "<p>NOMBRE: $NOMBRE</p>";
    }
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

/********************************************************************************************/

function obtenerIdCategoria($conn)
{
    $sql = "SELECT ID_CATEGORIA FROM categoria"; 
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $ultimoNum = $stmt->fetch(PDO::FETCH_ASSOC);
    $MaxNum = 0;

    if ($ultimoNum) 
    {
        foreach ($ultimoNum as $num)
        {
            $MaxNum = intval(substr($num, 2)); # intval para convertir a entero
        }
    }

    $MaxNum = $MaxNum + 1;

    return "C-" . str_pad($MaxNum, 3, "0", STR_PAD_LEFT);
}
?>