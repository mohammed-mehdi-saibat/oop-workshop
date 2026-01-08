<?php

declare(strict_types=1);

require_once 'src/Core/Database.php';

try {
    $pdo = Database::getInstance();
    echo "Successfully connected to the database.";
} catch (PDOException $e) {
    echo "Connection failed." . $e->getMessage();
}
