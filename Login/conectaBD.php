<?php
$host = "containers-us-west-79.railway.app";
$port = "6985";
$dbname = "railway";
$user = "postgres";
$password = "xiaI7G9YNEv0eBkC5JIb";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    echo "Erro na conexão com o banco de dados.";
    exit;
}
?>

