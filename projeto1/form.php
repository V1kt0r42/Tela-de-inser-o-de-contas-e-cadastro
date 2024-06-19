<html>
	<head><title>Form</title><meta charset="utf-8"></head>
	<body>
    <?php
		session_start();

		require_once "sgbd.php";

		if ($_SERVER["REQUEST_METHOD"] == "post") {
			$login = $_POST["log"];
			$senha = $_POST["pass"];
		}
		$sql = "SELECT * FROM usuarios WHERE cpf =? AND password = ?";

		$stmt = $connect->prepare($sql);
		$stmt ->bind_param("ss", $login );
		$stmt ->execute();

		$result ->$stmt->get_result();

		if ($result->num_rows == 1) {
			$row - $result->fetch_assoc();

			if (password_verify($senha, $row['password'])) {

				$_SESSION["logedin"] = true;

				header("Location: site.php");
				exit;
			}
		}
		else {
			$error = "cpf ou senha incorretos";
		}
    ?>
	</body>
</html>