<?php
include 'conexion.php';
$pdo = new Conexion();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_GET['id_sintoma'])) //busqueda por id
    {
        $sql = $pdo->prepare("SELECT solucion_descrip FROM solucion_falla Where id=:id");
        $sql->bindValue(':id', $_GET['id_sintoma']);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200 OK");
        echo json_encode($sql->fetchAll());
        echo json_decode();
        exit;
    } else {
        $sql = $pdo->prepare("SELECT * FROM solucion_falla"); //busqueda global
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200 OK");
        echo json_encode($sql->fetchAll());
        exit;
    }
}
