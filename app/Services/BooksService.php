<?php

namespace App\Services;

use App\Repositories\BooksRepository;
use App\Repositories\RecordsRepository;

class BooksService
{
    /**
     * @var BooksRepository
     */
    private $booksRepository;

    /**
     * @var RecordsRepository
     */
    private $recordsRepository;

    /**
     * BooksService constructor.
     *
     * @param BooksRepository $booksRepository
     * @param RecordsRepository $recordsRepository
     */
    public function __construct(BooksRepository $booksRepository, RecordsRepository $recordsRepository)
    {
        $this->booksRepository = $booksRepository;
        $this->recordsRepository = $recordsRepository;
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function checkAvailable($id)
    {
        $book = $this->booksRepository->findById($id);
        $records = $this->recordsRepository->findOpensByBookId($id);

        return $book->quantity > count($records);
    }

    /**
     * @param int|null $include
     *
     * @return mixed
     */
    public function listsAvailable($include = null)
    {
        $books = $this->booksRepository->lists();
        foreach ($books as $id => $book) {
            if ($id != $include && !$this->checkAvailable($id)) {
                unset($books[$id]);
            }
        }

        return $books;
    }
}
