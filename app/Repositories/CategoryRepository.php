<?php

namespace App\Repositories;

use App\Models\categories;
use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAll()
    {
       return categories::with('books')->get();
    }

    public function getById($id)
    {
        return categories::findOrFail($id);
    }

    public function create(array $data)
    {
        return categories::create($data);
    }

    public function update($id, array $data)
    {
        $category = categories::findOrFail($id);
        $category->update($data);
        return $category;
    }

    public function delete($id)
    {
        return categories::destroy($id);
    }
}
