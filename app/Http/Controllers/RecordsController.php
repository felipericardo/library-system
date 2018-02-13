<?php

namespace App\Http\Controllers;

use App\Repositories\BooksRepository;
use App\Repositories\CustomersRepository;
use App\Repositories\RecordsRepository;
use App\Services\BooksService;
use App\Services\RecordsService;
use Illuminate\Http\Request;

class RecordsController extends Controller
{
    /**
     * @var RecordsService
     */
    private $recordsService;

    /**
     * @var RecordsRepository
     */
    private $recordsRepository;

    /**
     * @var CustomersRepository
     */
    private $customersRepository;

    /**
     * @var BooksService
     */
    private $booksService;

    /**
     * @var BooksRepository
     */
    private $booksRepository;

    /**
     * RecordsController constructor.
     *
     * @param RecordsService $recordsService
     * @param RecordsRepository $recordsRepository
     * @param CustomersRepository $customersRepository
     * @param BooksService $booksService
     * @param BooksRepository $booksRepository
     */
    public function __construct(
        RecordsService $recordsService,
        RecordsRepository $recordsRepository,
        CustomersRepository $customersRepository,
        BooksService $booksService,
        BooksRepository $booksRepository
    ) {
        $this->recordsService = $recordsService;
        $this->recordsRepository = $recordsRepository;
        $this->customersRepository = $customersRepository;
        $this->booksService = $booksService;
        $this->booksRepository = $booksRepository;
    }

    public function create()
    {
        $customers = $this->customersRepository->lists();
        $books = $this->booksService->listsAvailable();

        return view('records.create', compact('customers', 'books'));
    }

    public function store(Request $request)
    {
        if (!$this->recordsService->create($request->except('_token', '_method'))) {
            return back()->withInput();
        }

        return redirect()->route('dashboard');
    }

    public function edit($id)
    {
        $record = $this->recordsRepository->findById($id);

        $customers = $this->customersRepository->lists();
        $books = $this->booksService->listsAvailable($record->book->id);

        return view('records.edit', compact('customers', 'books', 'record'));
    }

    public function update(Request $request, $id)
    {
        if (!$this->recordsService->update($id, $request->except('_token', '_method'))) {
            return back()->withInput();
        }

        return redirect()->route('dashboard');
    }

    public function destroy($id)
    {
        $this->recordsRepository->delete($id);

        return back();
    }

    public function complete($id)
    {
        $this->recordsService->complete($id);

        return back();
    }
}
