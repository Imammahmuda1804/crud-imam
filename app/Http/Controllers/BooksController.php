<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Services\BookService;

class BooksController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        $books = $this->bookService->getAll();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = $this->bookService->getCategories();
        $authors = $this->bookService->getAuthors();
        return view('books.create', compact('categories', 'authors'));
    }

    public function store(BookRequest $request)
    {
        $this->bookService->store($request->validated());
        return redirect()->route('books.index')->with('success', 'Book created successfully');
    }

    public function edit($id)
    {
        $book = $this->bookService->findById($id);
        $categories = $this->bookService->getCategories();
        $authors = $this->bookService->getAuthors();
        return view('books.edit', compact('book', 'categories', 'authors'));
    }

    public function update(BookRequest $request, $id)
    {
        $this->bookService->update($id, $request->validated());
        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    public function destroy($id)
    {
        $this->bookService->delete($id);
        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}
