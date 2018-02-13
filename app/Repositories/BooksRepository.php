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
     * @param array $data
     *
     * @return Book|bool
     */
    public function create(array $data)
    {
        $book = new Book();
        $book->fill($data);
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
     * @param array $data
     *
     * @return Book|bool
     */
    public function update($id, array $data)
    {
        $book = $this->findById($id);
        if (!$book) {
            return false;
        }

        $book->fill($data);
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
     *
     * @return bool
     */
    public function delete($id)
    {
        return Book::destroy($id) > 0;
    }

    /**
     * @return Book[]
     */
    public function findAll()
    {
        return Book::all();
    }

    /**
     * @param int $id
     *
     * @return Book|null
     */
    public function findById($id)
    {
        return Book::where('id', $id)->first();
    }

    /**
     * @return mixed
     */
    public function lists()
    {
        return Book::lists('title', 'id');
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->findAll());
    }
}
