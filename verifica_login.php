<html>
<link rel="stylesheet" type="text/css" href="style.css">
</html>

<?php
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

// Conecta-se ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cadastro";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se o usuário e a senha são válidos
$query = "SELECT * FROM usuarios WHERE usuario='$usuario' AND senha='$senha'";

$result = $conn->query($query);

if ($result->num_rows > 0) {
	// Exibe os dados salvos na tabela
	$query = "SELECT * FROM usuarios";
	$result = $conn->query($query);

	echo "<h1>Dados Salvos</h1>";
	echo "<table>";
	echo "<tr><th>Nome</th><th>Endereço</th><th>Idade</th><th>Usuário</th><th>Senha</th></tr>";
	while($row = $result->fetch_assoc()) {
		echo "<tr><td>".$row["nome"]."</td><td>".$row["endereco"]."</td><td>".$row["idade"]."</td><td>".$row["usuario"]."</td><td>".$row["senha"]."</td></tr>";
	}
	echo "</table>";
} else {
	echo "Usuário ou senha inválidos!";
}

$conn->close();


?>

