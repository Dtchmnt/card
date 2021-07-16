<?php

namespace App\Repositories;

use App\Http\Requests\MediaRequest;
use App\Http\Requests\UserRequest;
use App\Models\Media;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AvatarRequest;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Image;
use File;

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
    public function getAll()
    {
        return $this->media->orderBy('id', 'desc')->paginate(8);
    }

    /**
     * @param int $id
     * @return Media
     */
    public function getById(int $id): Media
    {
        return $this->media->findOrFail($id);
    }

    /**
     * @param UserRequest $request
     * @return bool|mixed
     */
    public function storeUser(UserRequest $request)
    {


        $validatedData = $request->validated();
        $inputArray = array(
            'name' => $validatedData['name'],
            'password' => Hash::make($validatedData['password']),
        );
        return $id = $this->users->create($inputArray)->assignRole('user')->id and $this->media->create([
                'user_id' => $id,
                'slug' => $validatedData['name'],
                'img' => 'no-avatar.png',
            ]);
    }

    /**
     * @param int $id
     * @return User
     */
    public function getEditFormById(int $id): User
    {
        return $this->users->findOrFail($id);
    }

    /**
     * @param $id
     * @param Request $request
     * @return mixed|void
     */
    public function updateUser($id, Request $request)
    {
        $validatorName = $request->validate([
            'name' => 'bail|required|max:255|regex:/^[a-z]+$/i',
        ]);
        $validatorAll = $request->validate([
            'name' => 'bail|required|max:255|regex:/^[a-z]+$/i',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
        ]);
        $findIdUser = $this->users->findOrFail($id);
        if ($request->change_password) {
            $inputArray = array(
                'name' => $validatorAll['name'],
                'password' => Hash::make($validatorAll['password']),
            );
            $findIdUser->update($inputArray);
        } else {
            $name = array(
                'name' => $validatorName['name']);
            $findIdUser->update($name);
        }
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteUser(int $id)
    {
        return $this->users->findOrFail($id)->delete();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function search(Request $request)
    {
        $search = $request->search;
        return Media::where('last_name', 'LIKE', "%{$search}%")
            ->orWhere('first_name', 'LIKE', "%{$search}%")
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    /**
     * @param Request $request
     * @return mixed|void
     */
    public function updateAvatarAuthUser(AvatarRequest $request)
    {
        $media = Media::where('user_id', Auth::user()->id)->first();

        $request->only([
            'img'
        ]);
        if ($request->hasFile('img')) {

            $avatar = $request->file('img');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            Image::make($avatar)->resize(350, 350, function ($img) {
                $img->aspectRatio();
                $img->upsize();
            })->save(public_path('/storage/') . $filename);

            $oldFilename = $media->img;
            $media->img = $filename;
            Storage::delete($oldFilename);

            File::delete(public_path('/storage/' . $oldFilename));
            $media->img = $filename;
        }
        $media->save();
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed|void
     */
    public function updateAvatarAdmin(AvatarRequest $request, $id)
    {
        $media = Media::find($id);

        $request->only([
            'img'
        ]);
        if ($request->hasFile('img')) {

            $avatar = $request->file('img');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            Image::make($avatar)->resize(350, 350, function ($img) {
                $img->aspectRatio();
                $img->upsize();
            })->save(public_path('/storage/') . $filename);

            $oldFilename = $media->img;
            $media->img = $filename;
            Storage::delete($oldFilename);

            File::delete(public_path('/storage/' . $oldFilename));
        }
        $media->save();
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function updateMediaAdmin(MediaRequest $request, $id)
    {
        $social = Media::find($id);
        $social->first_name = $request->first_name;
        $social->last_name = $request->last_name;
        $social->description = $request->description;
        $social->email = $request->email;
        $social->phone = $request->phone;
        $social->telegram = $request->telegram;
        $social->whats = $request->whats;
        $social->viber = $request->viber;
        $social->facebook = $request->facebook;
        $social->instagram = $request->instagram;
        $social->in = $request->in;
        $social->vk = $request->vk;
        $social->youtube = $request->youtube;
        $social->twitter = $request->twitter;
        $social->slug = $request->slug;
        $social->update();
    }

    /**
     * @param Request $request
     */
    public function updateMediaAuthUser(MediaRequest $request)
    {
        $social = Media::where('user_id', Auth::user()->id)->first();
        $social->first_name = $request->first_name;
        $social->last_name = $request->last_name;
        $social->description = $request->description;
        $social->email = $request->email;
        $social->phone = $request->phone;
        $social->telegram = $request->telegram;
        $social->whats = $request->whats;
        $social->viber = $request->viber;
        $social->facebook = $request->facebook;
        $social->instagram = $request->instagram;
        $social->in = $request->in;
        $social->vk = $request->vk;
        $social->youtube = $request->youtube;
        $social->twitter = $request->twitter;
        $social->user_id = Auth::user()->id;
        $social->update();
    }

}
