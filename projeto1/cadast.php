<?php
    require_once "sgbd.php";

    if ($_SERVER["REQUEST_METHOD"] == "post") {
        $login = $_POST["log"];
        $nome = $_POST["nome"];
        $datanasc = $_POST["data"];
        $senha = $_POST["pass"];
        $hashed_password = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (cpf, nome, data_nasc, password) VALUES (?, ?, ?, ?)";

        $stmt = $connect->prepare($sql);
        $stmt->bind_param("sss", $login, $nome, $datanasc, $hashed_password);

        if ($stmt->execute()) {
            echo "Usuário criado";
        } else {
            echo "Informção errada" . $sql . $connect->error;
        }
        $stmt->close();
    }
    $connect->close();
?>