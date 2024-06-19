<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    $servername = "localhost";
    $username = "victor";
    $password = "s3c1NF0r";
    $dbname = "registros";

    $connect = new mysqli($servername, $username, $password, $dbname);

    if ($connect->connect_error) {
        die("Falha de conexão" . $connect->connect_error);
    }
?>