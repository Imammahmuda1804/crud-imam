<?php

namespace App\Services;

use App\Repositories\Interfaces\AuthorRepositoryInterface;
use Illuminate\Http\UploadedFile;

class AuthorService
{
    protected $authorRepository;

    public function __construct(AuthorRepositoryInterface $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function getAll()
    {
        return $this->authorRepository->getAll();
    }

    public function getById($id)
    {
        return $this->authorRepository->getById($id);
    }

    public function store(array $data)
    {

        if (isset($data['photo']) && $data['photo'] instanceof UploadedFile) {
            $data['photo'] = $data['photo']->store('authors', 'public');
        }

        return $this->authorRepository->create($data);
    }

    public function update($id, array $data)
    {

        if (isset($data['photo']) && $data['photo'] instanceof UploadedFile) {
            $data['photo'] = $data['photo']->store('authors', 'public');
        }

        return $this->authorRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->authorRepository->delete($id);
    }
}
