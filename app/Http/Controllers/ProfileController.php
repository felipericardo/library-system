<?php

namespace App\Http\Controllers;

use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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

    public function edit()
    {
        $user = $this->usersRepository->findById(Auth::user()->id);

        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        if (!$this->usersRepository->update(Auth::user()->id, $request->except('_token', '_method', 'password_confirmation'))) {
            return back()->withInput();
        }

        return redirect()->route('dashboard');
    }
}
