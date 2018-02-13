<?php

namespace App\Repositories;

use App\Models\Category;
use Exception;

class CategoriesRepository
{
    /**
     * @var Category
     */
    private $category;

    /**
     * CategoriesRepository constructor.
     *
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @param array $data
     *
     * @return Category|bool
     */
    public function create(array $data)
    {
        $category = new Category();
        $category->fill($data);
        try {
            $category->save();
        } catch (Exception $e) {
            // Send error to bugsnag, sentry or similar...

            return false;
        }

        return $category;
    }

    /**
     * @param int $id
     * @param array $data
     *
     * @return Category|bool
     */
    public function update($id, array $data)
    {
        $category = $this->findById($id);
        if (!$category) {
            return false;
        }

        $category->fill($data);
        try {
            $category->save();
        } catch (Exception $e) {
            // Send error to bugsnag, sentry or similar...

            return false;
        }

        return $category;
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function delete($id)
    {
        return Category::destroy($id) > 0;
    }

    /**
     * @return Category[]
     */
    public function findAll()
    {
        return Category::all();
    }

    /**
     * @param int $id
     *
     * @return Category|null
     */
    public function findById($id)
    {
        return Category::where('id', $id)->first();
    }

    /**
     * @return mixed
     */
    public function lists()
    {
        return Category::lists('name', 'id');
    }
}