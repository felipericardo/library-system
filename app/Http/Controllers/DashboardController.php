<?php

namespace App\Http\Controllers;

use App\Repositories\BooksRepository;

class DashboardController extends Controller
{
    /**
     * @var BooksRepository
     */
    private $booksRepository;

    public function __construct(BooksRepository $booksRepository)
    {
        $this->booksRepository = $booksRepository;
    }

    public function index()
    {
        $booksCount = count($this->booksRepository->all());

        return view('dashboard.index', compact('booksCount'));
    }
}
