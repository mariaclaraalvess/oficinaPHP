<?php

// Conectar ao banco de dados MySQL
$host = "localhost"; // nome do host
$user = "root"; // nome de usuário do banco de dados
$pass = ""; // senha do banco de dados
$db = "php"; // nome do banco de dados

$conn = mysqli_connect($host, $user, $pass, $db);

// Verificar se houve erros na conexão
if (!$conn) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}

$email = $_POST["email"];

$senha = $_POST["senha"];

// Preparar a consulta SQL com parâmetros
$sql = "SELECT * FROM cadastro WHERE email = ? AND senha = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $email, $senha);

// Executar a consulta SQL
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Verificar se a consulta retornou resultados
if (mysqli_num_rows($result) > 0) {
    // Iterar sobre os resultados e exibi-los na tela
    while($row = mysqli_fetch_assoc($result)) {
        echo "Email: " . $row["email"] . " - Senha: " . $row["senha"] . "<br>";
    }
} else {
    echo "Nenhum resultado encontrado.";
}

// Fechar a conexão com o banco de dados
mysqli_close($conn);

?>
