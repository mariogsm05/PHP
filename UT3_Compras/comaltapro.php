<?php
    /*Alta de Productos (comaltapro.php): dar de alta productos. Para seleccionar la categoría del 
    producto, se utilizará una lista de valores con los nombres de las categorías. El id_producto 
    será un campo con el formato Pxxxx donde xxxx será un número secuencial que comienza en 
    1 completándose con 0 hasta completar el formato (este campo será calculado desde PHP).*/
?>

<h2>Formulario de Alta de Productos</h2>

<?php
$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "comprasweb";

try 
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Pongo esto aqui para que cargue la lista de categorias antes del formulario
    // Ya que lo tenia dentro del formulario y ahi no cargaba el ID_CATEGORIA
    $sql = "SELECT ID_CATEGORIA, NOMBRE FROM categoria";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $categorias = $stmt->fetchAll();
?>

<form method="post" action="">
    <label>NOMBRE PRODUCTO :</label>
    <input type="text" name="nombre"><br><br>
    <label>PRECIO PRODUCTO :</label>
    <input type="number" name="precio"><br><br>
    <label>ID CATEGORIA :</label>
    <select name="id_categoria">
        <?php
            foreach ($categorias as $categoria) 
            {
                echo "<option value='" . $categoria['ID_CATEGORIA'] . "'>" . $categoria['NOMBRE'] . "</option>";
            }
        ?>
    </select><br><br>
    <input type="submit" value="Enviar">
</form> 

<?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // recoger datos del formulario
        $ID_PRODUCTO = obtenerIdProducto($conn);
        $NOMBRE = $_POST['nombre'];
        $PRECIO = $_POST['precio'];
        $ID_CATEGORIA = $_POST['id_categoria'];
        
        // preparar y ejecutar la inserción
        $sql = "INSERT INTO producto (ID_PRODUCTO, NOMBRE, PRECIO, ID_CATEGORIA) VALUES (:id_producto, :nombre, :precio, :id_categoria)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_producto', $ID_PRODUCTO);
        $stmt->bindParam(':nombre', $NOMBRE);
        $stmt->bindParam(':precio', $PRECIO);
        $stmt->bindParam(':id_categoria', $ID_CATEGORIA);
        $stmt->execute();
        
        echo "<h3>PRODUCTO DADO DE ALTA</h3>";
        echo "<p>ID_PRODUCTO: $ID_PRODUCTO</p>";
        echo "<p>NOMBRE: $NOMBRE</p>";
        echo "<p>PRECIO: $PRECIO</p>";
        echo "<p>ID_CATEGORIA: $ID_CATEGORIA</p>";
    }
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

/********************************************************************************************/

function obtenerIdProducto($conn)
{
    $sql = "SELECT ID_PRODUCTO FROM producto ORDER BY ID_PRODUCTO DESC LIMIT 1"; 
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $ultimoNum = $stmt->fetch(PDO::FETCH_ASSOC);
    $MaxNum = 0;

    if ($ultimoNum) 
    {
        foreach ($ultimoNum as $num)
        {
            $MaxNum = intval(substr($num, 1)); // intval para convertir a entero
        }
    }

    $MaxNum = $MaxNum + 1;

    return "P" . str_pad($MaxNum, 4, "0", STR_PAD_LEFT);
}
?>