<?php

namespace App\Repositories;

use App\Models\User;
use App\Interfaces\UserInterface;;

class UserRepository implements UserInterface
{
    public function all($search = null)
    {
        return User::search($search)->paginate();
    }

    public function find(User $country): User
    {
        return User::find($country);
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(User $country, array $data): User
    {
        $country->update($data);
        return $country;
    }

    public function delete(User $country): bool
    {
        return User::destroy($country->id);
    }
}
