<html>
<link rel="stylesheet" type="text/css" href="style.css">
</html>

<?php
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$idade = $_POST['idade'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

// Verifica se todos os campos foram preenchidos
if(empty($nome) || empty($endereco) || empty($idade) || empty($usuario) || empty($senha)) {
    echo "Todos os campos são obrigatórios!";
    exit();
}

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

// Insere as informações na tabela
$query = "INSERT INTO usuarios (nome, endereco, idade, usuario, senha) VALUES ('$nome', '$endereco', $idade, '$usuario', '$senha')";

if ($conn->query($query) === TRUE) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>
