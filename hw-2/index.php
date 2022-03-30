<?php declare(strict_types=1);

// TODO delete this. It just for dev mode
require_once './errors.php';

// TODO delete.
// phpinfo();

echo 'Hi there' . '<br>' . '<pre>';

try {
    $dbc = new PDO(
        'mysql:host=db;port:3306;dbname:hillel_hw_1', 
        'root', 
        'secret', 
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

} catch (PDOException $e) {
    echo $e->getMessage(); 
}

// TODO delete. Dev mode query 
$res = $dbc->query("SELECT * FROM hillel_hw_1.user", PDO::FETCH_ASSOC);

print_r($res->fetchAll());

