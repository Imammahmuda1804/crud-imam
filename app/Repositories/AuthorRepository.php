<?php

namespace App\Repositories;

use App\Models\Author;
use App\Models\authors;
use App\Repositories\Interfaces\AuthorRepositoryInterface;

class AuthorRepository implements AuthorRepositoryInterface
{
    public function getAll()
    {
        return authors::latest()->get();
    }

    public function getById($id)
    {
        return authors::findOrFail($id);
    }

    public function create(array $data)
    {
        return authors::create($data);
    }

    public function update($id, array $data)
    {
        $author = authors::findOrFail($id);
        $author->update($data);
        return $author;
    }

    public function delete($id)
    {
        return authors::destroy($id);
    }
}
