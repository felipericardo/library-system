<?php

namespace App\Http\Controllers;

use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * @var UsersRepository
     */
    private $usersRepository;

    /**
     * UsersController constructor.
     *
     * @param UsersRepository $usersRepository
     */
    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function index()
    {
        $users = $this->usersRepository->findAll();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        if (!$this->usersRepository->create($request->except('password_confirm'))) {
            return back()->withInput();
        }

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = $this->usersRepository->findById($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        if (!$this->usersRepository->update($id, $request->except('_token', '_method', 'password_confirmation'))) {
            return back()->withInput();
        }

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        if (Auth::user()->id == $id) {
            // code...
        } else {
            $this->usersRepository->delete($id);
        }

        return redirect()->route('users.index');
    }
}
