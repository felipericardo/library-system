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

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
        $this->middleware('auth');
    }

    public function index()
    {
        $users = $this->usersRepository->all();

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
            $this->usersRepository->destroy($id);
        }

        return redirect()->route('users.index');
    }
}
