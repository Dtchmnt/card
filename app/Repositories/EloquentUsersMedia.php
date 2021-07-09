<?php

namespace App\Repositories;

use App\Models\Media;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class EloquentUsersMedia implements usersMediaRepository
{
    protected $users;
    protected $media;

    public function __construct(User $users, Media $media)
    {
        $this->users = $users;
        $this->media = $media;
    }

    /**
     * {@inheritdoc}
     */

    public function getAll(): Collection
    {
        return $this->media->orderBy('id', 'desc')->get();
    }

    public function getById(int $id): Media
    {
        return $this->media->findOrFail($id);
    }

    public function storeUser(Request $request)
    {
        $inputArray = array(
            'name' => $request['name'],
            'password' => Hash::make($request['password']),
        );
        return $id = $this->users->create($inputArray)->assignRole('user')->id and $this->media->create([
                'user_id' => $id,
                'img' => 'no-avatar.png',
            ]);
    }

    public function getEditFormById(int $id): User
    {
        return $this->users->findOrFail($id);
    }

    public function updateUser($id, Request $request)
    {
        $findIdUser = $this->users->findOrFail($id);
        if ($request->change_password) {
            $inputArray = array(
                'name' => $request['name'],
                'password' => Hash::make($request['password']),
            );
            $findIdUser->update($inputArray);
        } else {
            $name = array(
                'name' => $request['name']);
            $findIdUser->update($name);
        }
    }

    public function deleteUser(int $id)
    {
        return $this->users->findOrFail($id)->delete();
    }

    public function search(Request $request)
    {
        $search = $request->search;
        return Media::where('first_name', 'LIKE', "%{$search}%")->orderBy('created_at', 'desc')->paginate(10);
    }

}
