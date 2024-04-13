<?php
$host = "localhost";
$db = "echo";
$user = "root";
$password = "";
$charset = "utf8mb4";
/**
 * Arquivo de conexão com o banco de dados.
 * @param string $host     The host name or IP address of the MySQL server.
 * @param string $db       The name of the database to connect to.
 * @param string $charset  The character set to use for the connection.
 * @return PDO            A PDO object representing the database connection.
 */
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

/**
 * Estabelece uma conexão com o banco de dados utilizando a classe PDO.
 *
 * @param string $dsn O DSN (Data Source Name) que identifica o tipo de banco de dados e a localização.
 * @param string $user O nome de usuário para autenticação no banco de dados.
 * @param string $password A senha para autenticação no banco de dados.
 * @throws PDOException Se ocorrer um erro ao estabelecer a conexão com o banco de dados.
 */
try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Ativa o modo de erros do PDO.
} catch (PDOException $e) {
    echo "Erro ao conectar com o banco de dados:";
    throw new PDOException($e->getMessage()); // Lança uma exceção com a mensagem de erro.0
}
