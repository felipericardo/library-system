<?php

namespace App\Http\Controllers;

use App\Repositories\BooksRepository;
use App\Repositories\RecordsRepository;
use App\Services\RecordsService;

class DashboardController extends Controller
{
    /**
     * @var BooksRepository
     */
    private $booksRepository;

    /**
     * @var RecordsService
     */
    private $recordsService;

    /**
     * @var RecordsRepository
     */
    private $recordsRepository;

    /**
     * DashboardController constructor.
     *
     * @param BooksRepository $booksRepository
     * @param RecordsService $recordsService
     * @param RecordsRepository $recordsRepository
     */
    public function __construct(
        BooksRepository $booksRepository,
        RecordsService $recordsService,
        RecordsRepository $recordsRepository
    ) {
        $this->booksRepository = $booksRepository;
        $this->recordsRepository = $recordsRepository;
        $this->recordsService = $recordsService;
    }

    public function index()
    {
        $recordsOpen = $this->recordsService->findOpens();
        $recordsClosed = $this->recordsService->findClosed();
        $booksCount = $this->booksRepository->count();
        $recordsCount = count($recordsOpen);
        $lateCount = $this->recordsRepository->countLate();

        return view('dashboard.index', compact(
            'booksCount', 'recordsCount', 'lateCount', 'recordsOpen', 'recordsClosed'
        ));
    }
}
