<?php
include './conexion.php';
$pdo = new Conexion();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nombrefalla'], $_POST['det_falla'], $_POST['causafalla'], $_POST['recomendacionf'])) //busqueda por id
    {

        $sql = "INSERT INTO solucion_falla (nombre, recomendaciones, causas, descripccion) VALUES (:nombre, :recomendaciones, :causas, :descripccion)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':nombre', $_POST['nombrefalla']);
        $stmt->bindValue(':recomendaciones', $_POST['recomendacionf']);
        $stmt->bindValue(':causas', $_POST['causafalla']);
        $stmt->bindValue(':descripccion', $_POST['det_falla']);
        $stmt->execute();
        $data = $stmt;

        header("HTTP/1.1 200 OK");

        echo '<script type="text/javascript">
    alert("Registros de Falla, guardados correctamente");
    window.location.href="../grabar.php";
    </script>';
        exit;
    }
}
