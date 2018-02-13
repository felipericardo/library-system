<?php

namespace App\Http\Controllers;

use App\Repositories\BooksRepository;

class DashboardController extends Controller
{
    /**
     * @var BooksRepository
     */
    private $booksRepository;

    /**
     * DashboardController constructor.
     *
     * @param BooksRepository $booksRepository
     */
    public function __construct(BooksRepository $booksRepository)
    {
        $this->booksRepository = $booksRepository;
    }

    public function index()
    {
        $booksCount = $this->booksRepository->count();

        return view('dashboard.index', compact('booksCount'));
    }
}
