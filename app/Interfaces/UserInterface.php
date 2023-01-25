<?php

namespace App\Interfaces;

use App\Models\User;

interface UserInterface
{
    public function all($search = null);

    public function find(User $user);

    public function create(array $data);

    public function update(User $user, array $data);

    public function delete(User $user);
}
