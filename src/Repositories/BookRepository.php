<?php

declare(strict_types=1);

require_once 'src/Core/Database.php';

class BookRepository
{
    public function findAll(): array
    {
        $db = Database::getInstance();
        $sql = "SELECT "
    }
}
