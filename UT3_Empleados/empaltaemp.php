<?php
    /*Realizar un programa en php empaltaemp.php que permita dar de alta un empleado en la
    empresa. Para seleccionar el departamento, al que se asignará al empleado inicialmente, se
    utilizará una lista de valores con los nombres de los departamentos de la empresa.*/
?>

<h2>Formulario de Alta de Empleados</h2>

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

        $sql_dpto = "SELECT cod_dpto, nombre_dpto FROM departamento";
        $stmt_dpto = $conn->prepare($sql_dpto);
        $stmt_dpto->execute();
        $stmt_dpto->setFetchMode(PDO::FETCH_ASSOC);
        $nombre_dpto = $stmt_dpto->fetchAll();
?>

    <form method="post" action="">

        <label>DNI EMPLEADO :</label>
        <input type="text" name="dni"><br><br>

        <label>NOMBRE EMPLEADO :</label>
        <input type="text" name="nombre"><br><br>

        <label>APELLIDOS EMPLEADO :</label>
        <input type="text" name="apellidos"><br><br>

        <label>FECHA NACIMIENTO :</label>
        <input type="date" name="fecha_nac"><br><br>

        <label>SALARIO :</label>
        <input type="number" name="salario"><br><br>

        <label>DEPARTAMENTO :</label>
        <select name="cod_dpto">
            <?php
                foreach ($nombre_dpto as $dpto) 
                {
                    echo "<option value='" . $dpto['cod_dpto'] . "'>" . $dpto['nombre_dpto'] . "</option>";
                }
            ?>
        </select><br><br>

        <label>FECHA DE INICIO EN DEPARTAMENTO :</label>
        <input type="date" name="fecha_ini"><br><br>

        <input type="submit" value="Enviar">
    </form>

<?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $dni = $_POST['dni'];
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $fecha_nac = $_POST['fecha_nac'];
            $salario = $_POST['salario'];
            $cod_dpto = $_POST['cod_dpto'];
            $fecha_ini = $_POST['fecha_ini'];

            $sql_empleado = "INSERT INTO empleado (dni, nombre, apellidos, fecha_nac, salario) VALUES
                            (:dni, :nombre, :apellidos, :fecha_nac, :salario)";
            $stmt_empleado = $conn->prepare($sql_empleado);
            $stmt_empleado->bindParam(':dni', $dni);
            $stmt_empleado->bindParam(':nombre', $nombre);
            $stmt_empleado->bindParam(':apellidos', $apellidos);
            $stmt_empleado->bindParam(':fecha_nac', $fecha_nac);
            $stmt_empleado->bindParam(':salario', $salario);
            $stmt_empleado->execute();

            $sql_emple_depart = "INSERT INTO emple_depart (dni, cod_dpto, fecha_ini, fecha_fin) VALUES
                                (:dni, :cod_dpto, :fecha_ini, NULL)";
            $stmt_emple_depart = $conn->prepare($sql_emple_depart);
            $stmt_emple_depart->bindParam(':dni', $dni);
            $stmt_emple_depart->bindParam(':cod_dpto', $cod_dpto);
            $stmt_emple_depart->bindParam(':fecha_ini', $fecha_ini);
            $stmt_emple_depart->execute();

            $conn->commit();
            echo "<h3>EMPLEADO DADO DE ALTA</h3>";
            echo "<p>DNI EMPLEADO: $dni</p>";
            echo "<p>NOMBRE EMPLEADO: $nombre</p>";
            echo "<p>APELLIDOS EMPLEADO: $apellidos</p>";
            echo "<p>FECHA NACIMIENTO: $fecha_nac</p>";
            echo "<p>SALARIO: $salario</p>";
            echo "<p>CODIGO DEPARTAMENTO: $cod_dpto</p>";
            echo "<p>FECHA INICIO EN DEPARTAMENTO: $fecha_ini</p>";
        }
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
?>