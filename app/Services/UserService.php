<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Collection;

class UserService
{
    /**
     * @param array $data
     * @return User
     */
    public function create(array $data): User
    {
        return User::create($data);
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return User::all();
    }

    /**
     * @param $id
     * @return User|null
     */
    public function getById($id): ?User
    {
        return User::find($id);
    }

    /**
     * @param $id
     * @param array $data
     * @return User|null
     */
    public function update($id, array $data): ?User
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id): bool
    {
        return (bool) User::destroy($id);
    }
}
