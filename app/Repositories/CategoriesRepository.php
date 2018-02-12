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
     * @param array $request
     *
     * @return Category|bool
     */
    public function create(array $request)
    {
        $category = new Category();
        $category->fill($request);
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
     * @param array $request
     *
     * @return Category|bool
     */
    public function update($id, array $request)
    {
        $category = $this->findById($id);
        if (!$category) {
            return false;
        }

        $category->fill($request);
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
    public function destroy($id)
    {
        return Category::destroy($id) > 0;
    }

    /**
     * @return Category[]
     */
    public function all()
    {
        return Category::all();
    }

    /**
     * @param $id
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