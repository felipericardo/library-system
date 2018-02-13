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
     * @param array $data
     *
     * @return User|bool
     */
    public function create(array $data)
    {
        $user = new User();
        $data['password'] = bcrypt($data['password']);
        $user->fill($data);
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
     * @param array $data
     *
     * @return User|bool
     */
    public function update($id, array $data)
    {
        $user = $this->findById($id);
        if (!$user) {
            return false;
        }

        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        $user->fill($data);
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
    public function delete($id)
    {
        return User::destroy($id) > 0;
    }

    /**
     * @return User[]
     */
    public function findAll()
    {
        return User::all();
    }

    /**
     * @param int $id
     *
     * @return User|null
     */
    public function findById($id)
    {
        return User::where('id', $id)->first();
    }
}