<?php

namespace App\Http\Controllers;

use App\Repositories\BooksRepository;
use App\Repositories\CategoriesRepository;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * @var BooksRepository
     */
    private $booksRepository;

    /**
     * @var CategoriesRepository
     */
    private $categoriesRepository;

    public function __construct(BooksRepository $booksRepository, CategoriesRepository $categoriesRepository)
    {
        $this->booksRepository = $booksRepository;
        $this->categoriesRepository = $categoriesRepository;

        $this->middleware('auth');
    }

    public function index()
    {
        $books = $this->booksRepository->all();

        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = $this->categoriesRepository->lists();

        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        if (!$this->booksRepository->create($request->except('_token', '_method'))) {
            return back()->withInput();
        }

        return redirect()->route('books.index');
    }

    public function edit($id)
    {
        $categories = $this->categoriesRepository->lists();
        $book = $this->booksRepository->findById($id);

        return view('books.edit', compact('categories', 'book'));
    }

    public function update(Request $request, $id)
    {
        if (!$this->booksRepository->update($id, $request->except('_token', '_method'))) {
            return back()->withInput();
        }

        return redirect()->route('books.index');
    }

    public function destroy($id)
    {
        $this->booksRepository->destroy($id);

        return redirect()->route('books.index');
    }
}
