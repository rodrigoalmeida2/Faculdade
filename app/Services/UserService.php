<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $repository)
    {
        $this->userRepository = $repository;
    }
    public function list(): mixed
    {
        return $this->userRepository->list();
    }

    public function get(int $id): mixed
    {
        return $this->userRepository->get($id);
    }

    public function update(int $id, array $data): mixed
    {
        return $this->userRepository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->userRepository->delete($id);
    }
}