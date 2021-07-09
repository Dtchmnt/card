<?php

namespace App\Repositories;

use App\Models\Media;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

interface usersMediaRepository
{
    /**
     * Get all users
     *
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * Get user by id
     *
     * @param int $id
     * @return Media
     */
    public function getById(int $id): Media;

    /**
     * @param int $id
     * @return User
     */
    public function getEditFormById(int $id): User;

    /**
     * @param Request $request
     * @return mixed
     */
    public function storeUser(Request $request);

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function updateUser($id, Request $request);

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteUser(int $id);

    /**
     * @param Request $request
     * @return mixed
     */
    public function search(Request $request);

}
