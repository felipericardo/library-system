<?php

namespace App\Http\Controllers;

use App\Repositories\CustomersRepository;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * @var CustomersRepository
     */
    private $customersRepository;

    /**
     * CustomersController constructor.
     *
     * @param CustomersRepository $customersRepository
     */
    public function __construct(CustomersRepository $customersRepository)
    {
        $this->customersRepository = $customersRepository;
    }

    public function index()
    {
        $customers = $this->customersRepository->findAll();

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        if (!$this->customersRepository->create($request->except('_token', '_method'))) {
            return back()->withInput();
        }

        return redirect()->route('customers.index');
    }

    public function edit($id)
    {
        $customer = $this->customersRepository->findById($id);

        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        if (!$this->customersRepository->update($id, $request->except('_token', '_method'))) {
            return back()->withInput();
        }

        return redirect()->route('customers.index');
    }

    public function destroy($id)
    {
        $this->customersRepository->delete($id);

        return redirect()->route('customers.index');
    }
}
