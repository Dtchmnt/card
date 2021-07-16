<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Media;
use App\Models\User;
use App\Repositories\EloquentUsersMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param EloquentUsersMedia $usersEloquent
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(EloquentUsersMedia $usersEloquent)
    {
        $users = $usersEloquent->getAll();
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EloquentUsersMedia $usersEloquent
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EloquentUsersMedia $usersEloquent, UserRequest $request)
    {
        $usersEloquent->storeUser($request);
        return redirect()->back()->withSuccess('Пользователь успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param EloquentUsersMedia $mediaEloquent
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function show(EloquentUsersMedia $mediaEloquent, $id)
    {
        $media = $mediaEloquent->getById($id);
        return view('admin.users.show', [
            'media' => $media
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param EloquentUsersMedia $userEloquent
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(EloquentUsersMedia $userEloquent, $id)
    {
        $users = $userEloquent->getEditFormById($id);
        return view('admin.users.edit', [
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EloquentUsersMedia $userEloquent
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(EloquentUsersMedia $userEloquent, Request $request, $id)
    {
        $userEloquent->updateUser($id, $request);
        return redirect()->back()->withSuccess('Пользователь успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param EloquentUsersMedia $userEloquent
     * @param $id
     * @return void
     */
    public function destroy(EloquentUsersMedia $userEloquent, $id)
    {
        $userEloquent->deleteUser($id);
        return redirect()->back()->withSuccess('Пользователь успешно удален');
    }

    /**
     * @param EloquentUsersMedia $userEloquent
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function search(EloquentUsersMedia $userEloquent, Request $request)
    {
        $users = $userEloquent->search($request);
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

}
