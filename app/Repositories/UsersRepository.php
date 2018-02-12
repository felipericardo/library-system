<?php

namespace App\Repositories;

use App\Models\User;
use Exception;

class UsersRepository
{
    /**
     * @var User
     */
    private $user;

    /**
     * UsersRepository constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param array $request
     *
     * @return User|bool
     */
    public function create(array $request)
    {
        $user = new User();
        $request['password'] = bcrypt($request['password']);
        $user->fill($request);
        try {
            $user->save();
        } catch (Exception $e) {
            // Send error to bugsnag, sentry or similar...

            return false;
        }

        return $user;
    }

    /**
     * @param int $id
     * @param array $request
     *
     * @return User|bool
     */
    public function update($id, array $request)
    {
        $user = $this->findById($id);
        if (!$user) {
            return false;
        }

        if (isset($request['password']) && !empty($request['password'])) {
            $request['password'] = bcrypt($request['password']);
        }
        $user->fill($request);
        try {
            $user->save();
        } catch (Exception $e) {
            // Send error to bugsnag, sentry or similar...

            return false;
        }

        return $user;
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function destroy($id)
    {
        return User::destroy($id) > 0;
    }

    /**
     * @return User[]
     */
    public function all()
    {
        return User::all();
    }

    /**
     * @param $id
     *
     * @return User|null
     */
    public function findById($id)
    {
        return User::where('id', $id)->first();
    }
}