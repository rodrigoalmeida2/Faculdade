<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function list(): mixed
    {
        $result = User::select('id', 'name', 'email', 'created_at');
        return $result->get();
    }

    public function get(int $id): mixed
    {
        $result = User::where('id', $id)->first();

        return $result;
    }

    public function update(int $id, array $data): mixed
    {
        $user = User::find($id);
        if ($user) {
            $user->update($data);
            return $user;
        }
        return $user;
    }

    public function delete(int $id): bool
    {
        User::delete($id);
        return true;
    }
}