<?php

namespace App\Repositories;

use App\Models\Book;
use App\Models\books;
use App\Repositories\Interfaces\BookRepositoryInterface;

class BookRepository implements BookRepositoryInterface
{
    public function getAll()
    {
        return books::with(['author', 'category'])->latest()->get();
    }

    public function getById($id)
    {
        return books::with(['author', 'category'])->findOrFail($id);
    }

    public function create(array $data)
    {

        return books::create($data);
    }

    public function update($id, array $data)
    {
        $book = books::findOrFail($id);
        $book->update($data);
        return $book;
    }

    public function delete($id)
    {
        return books::destroy($id);
    }
}
