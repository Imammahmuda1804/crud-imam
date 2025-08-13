<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Services\AuthorService;

class AuthorsController extends Controller
{
    protected $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function index()
    {
        $authors = $this->authorService->getAll();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(AuthorRequest $request)
    {
        $this->authorService->store($request->validated());
        return redirect()->route('authors.index')->with('success', 'Author created successfully');
    }

    public function edit($id)
    {
        $author = $this->authorService->getById($id);
        return view('authors.edit', compact('author'));
    }

    public function update(AuthorRequest $request, $id)
    {
        $this->authorService->update($id, $request->validated());
        return redirect()->route('authors.index')->with('success', 'Author updated successfully');
    }

    public function destroy($id)
    {
        $this->authorService->delete($id);
        return redirect()->route('authors.index')->with('success', 'Author deleted successfully');
    }
}
