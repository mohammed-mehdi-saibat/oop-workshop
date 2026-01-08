<?php

declare(strict_types=1);

class Book
{
    protected int $id;
    protected string $title;
    protected float $price;
    protected int $stock;
    protected Author $author;

    public function __construct(int $id, string $title, float $price, int $stock, Author $author)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->stock = $stock;
        $this->author = $author;
    }

    // GETTER
    public function getId(): int
    {
        return $this->id;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
    public function getStock(): int
    {
        return $this->stock;
    }
    public function getAuthor(): Author
    {
        return $this->author;
    }
    // GETTER
    public function displayInfo(): void
    {
        echo "Book ID: {$this->id}\n
        Book Title: {$this->title}\n
        Book Price: {$this->price}\n
        Book stock: {$this->stock}\n
        Book Author: {$this->author->getName()}\n
        Author email: {$this->author->getEmail()}
        ";
    }
}
