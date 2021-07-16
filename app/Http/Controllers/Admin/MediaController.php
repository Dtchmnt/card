<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AvatarRequest;
use App\Http\Requests\MediaRequest;
use App\Models\Media;
use App\Repositories\EloquentUsersMedia;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index($id)
    {
        $social = Media::where('id', '=', $id)->get();

        return view('admin.users.index', [
            'social' => $social
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Media $social
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Media $social)
    {
        return view('admin.users.show', [
            'social' => $social
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Media $social
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $socials = Media::find($id);
        return view('admin.social.edit', [
            'socials' => $socials
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
    public function update(EloquentUsersMedia $userEloquent, MediaRequest $request, $id)
    {

        $userEloquent->updateMediaAdmin($request, $id);
        return redirect()->back()->withSuccess('Пользователь успешно обновлен');
    }

    /**
     * @param EloquentUsersMedia $userEloquent
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function updateAvatarAdmin(EloquentUsersMedia $userEloquent, AvatarRequest $request, $id)
    {
        $userEloquent->updateAvatarAdmin($request, $id);
        return redirect()->back()->withSuccess('Аватарка обновлена');
    }
}
