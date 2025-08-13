<?php

namespace App\Services;
use App\Repositories\Interfaces\BookRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\AuthorRepositoryInterface;
use Illuminate\Http\UploadedFile;

class BookService
{
    protected $bookRepository;
    protected $categoryRepository;
    protected $authorRepository;

    public function __construct(
       BookRepositoryInterface $bookRepository,
        CategoryRepositoryInterface $categoryRepository,
        AuthorRepositoryInterface $authorRepository
    ) {
        $this->bookRepository = $bookRepository;
        $this->categoryRepository = $categoryRepository;
        $this->authorRepository = $authorRepository;
    }

    public function getAll()
    {
        return $this->bookRepository->getAll();
    }

    public function store(array $data)
    {
          if (isset($data['cover_image']) && $data['cover_image'] instanceof UploadedFile) {
            $data['cover_image'] = $data['cover_image']->store('books', 'public');
        }

        return $this->bookRepository->create($data);
    }

    public function findById($id)
    {
        return $this->bookRepository->getById($id);
    }

    public function update($id, array $data)
    {
          if (isset($data['cover_image']) && $data['cover_image'] instanceof UploadedFile) {
            $data['cover_image'] = $data['cover_image']->store('books', 'public');
        }
        return $this->bookRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->bookRepository->delete($id);
    }

    public function getCategories()
    {
        return $this->categoryRepository->getAll();
    }

    public function getAuthors()
    {
        return $this->authorRepository->getAll();
    }
}
