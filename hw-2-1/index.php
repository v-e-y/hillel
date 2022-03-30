<?php declare(strict_types=1);

require_once './errors.php';

echo 'Hi there' . '<br>' . '<pre>';

try {
    $dbc = new PDO(
        'pgsql:host=pgdb;dbname=hillel_hw_2_1', 
        'root', 
        'secret', 
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

} catch (PDOException $e) {
    echo $e->getMessage(); 
}

// Create table
$req = $dbc->query("CREATE TABLE IF NOT EXISTS users (
    id serial PRIMARY KEY,
    name character varying(25),
    email  character varying(62) NOT NULL UNIQUE
)");

// Write data to created table
$req = $dbc->query("INSERT INTO users (name, email) VALUES ('Ed', 'test@example.com')");

$res = $dbc->query("SELECT * FROM users", PDO::FETCH_ASSOC);

print_r($res->fetchAll());

