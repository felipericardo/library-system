<?php

namespace App\Repositories;

use App\Models\Book;
use Exception;

class BooksRepository
{
    /**
     * @var Book
     */
    private $book;

    /**
     * BooksRepository constructor.
     *
     * @param Book $book
     */
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    /**
     * @param array $request
     *
     * @return Book|bool
     */
    public function create(array $request)
    {
        $book = new Book();
        $book->fill($request);
        try {
            $book->save();
        } catch (Exception $e) {
            // Send error to bugsnag, sentry or similar...

            return false;
        }

        return $book;
    }

    /**
     * @param int $id
     * @param array $request
     *
     * @return Book|bool
     */
    public function update($id, array $request)
    {
        $book = $this->findById($id);
        if (!$book) {
            return false;
        }

        $book->fill($request);
        try {
            $book->save();
        } catch (Exception $e) {
            dd($e->getMessage());
            // Send error to bugsnag, sentry or similar...

            return false;
        }

        return $book;
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function destroy($id)
    {
        return Book::destroy($id) > 0;
    }

    /**
     * @return Book[]
     */
    public function all()
    {
        return Book::all();
    }

    /**
     * @param $id
     *
     * @return Book|null
     */
    public function findById($id)
    {
        return Book::where('id', $id)->first();
    }
}