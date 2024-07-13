<?php
require_once 'conn.php';

if (isset($_REQUEST['id'])) {
    $query = "DELETE FROM `Programador` WHERE id = '$_REQUEST[id]'";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    header('location: table.php');
}
