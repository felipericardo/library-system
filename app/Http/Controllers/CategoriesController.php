<?php

namespace App\Http\Controllers;

use App\Repositories\CategoriesRepository;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * @var CategoriesRepository
     */
    private $categoriesRepository;

    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function index()
    {
        $categories = $this->categoriesRepository->all();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        if (!$this->categoriesRepository->create($request->except('_token', '_method'))) {
            return back()->withInput();
        }

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = $this->categoriesRepository->findById($id);

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        if (!$this->categoriesRepository->update($id, $request->except('_token', '_method'))) {
            return back()->withInput();
        }

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $this->categoriesRepository->destroy($id);

        return redirect()->route('categories.index');
    }
}
