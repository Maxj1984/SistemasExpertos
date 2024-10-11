<?php
include './conexion.php';
$pdo = new Conexion();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['insertSintoma'])) //busqueda por id
    {

        $sql = "INSERT INTO sintomas_falla (sintoma_descrip) VALUES (:sintoma_descrip)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':sintoma_descrip', $_POST['insertSintoma']);
        $stmt->execute();
        $data = $stmt;

        header("HTTP/1.1 200 OK");

        echo '<script type="text/javascript">
    alert("Registro Guardado, vaya a selección de Sintomas para visualizar");
    window.location.href="../grabar.php";
    </script>';
        exit;
    }
}
