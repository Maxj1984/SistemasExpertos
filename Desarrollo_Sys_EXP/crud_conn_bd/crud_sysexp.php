<?php
include './crud_conn_bd/conexion.php';
$pdo = new Conexion();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['id_sintoma'])) //busqueda por id
    {
        $sql = $pdo->prepare("SELECT * FROM solucion_falla Where id_solucion in (:id)");
        $sql->bindValue(':id', $_POST['id_sintoma']);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200 OK");
        $datos = $sql->fetchAll();
    } else {
        $sql = $pdo->prepare("SELECT * FROM solucion_falla Where id_solucion in (:id)");
        $sql->bindValue(':id', 99999);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200 OK");
        $datos = $sql->fetchAll();
    }
}
