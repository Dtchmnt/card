<?php

namespace App\Http\Controllers\AuthUsers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MediaRequest;
use App\Models\Media;
use App\Models\User;
use App\Repositories\EloquentUsersMedia;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MediaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit()
    {
        $userMedia = Media::where('user_id', Auth::user()->id)->first();
        return view('user.media_edit', [
            'userMedia' => $userMedia
        ]);
    }

    public function update(EloquentUsersMedia $usersMedia, MediaRequest $request)
    {
        $usersMedia->updateMediaAuthUser($request);
        return redirect()->back()->withSuccess('Пользователь успешно обновлен');
    }
}
