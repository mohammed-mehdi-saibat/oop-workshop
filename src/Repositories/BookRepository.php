<?php

declare(strict_types=1);

require_once 'src/Core/Database.php';
require_once 'src/Entities/Author.php';
require_once 'src/Entities/Book.php';

class BookRepository
{
    public function findAll(): array
    {
        $db = Database::getInstance();
        $sql = "SELECT b.*, a.id as author_id, a.name as author_name, a.email as author_email FROM books b JOIN authors a on b.author_id = a.id;";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $rows = $stmt->fetchAll();

        $books = [];

        foreach ($rows as $row) {
            $author = new Author((int)$row['author_id'], $row['author_name'], $row['author_email']);
            $book = new Book((int)$row['id'], $row['title'], (float)$row['price'], (int)$row['stock'], $author);
            $books[] = $book;
        }

        return $books;
    }

    public function findByTitle(string $title): ?Book
    {
        $db = Database::getInstance();
        $sql = "SELECT b.*, a.id as author_id, a.name as author_name, a.email as author_email FROM books b JOIN authors a ON b.author_id = a.id WHERE b.title = :title";
        $stmt = $db->prepare($sql);
        $stmt->execute(['title' => $title]);

        $row = $stmt->fetch();

        if (!$row) return null;

        $author = new Author((int)$row['author_id'], $row['author_name'], $row['author_email']);
        $book = new Book((int)$row['id'], $row['title'], (float)$row['price'], (int)$row['stock'], $author);

        return $book;
    }
}

$books = new BookRepository();
print_r($books->findByTitle('The Clean Coder'));
