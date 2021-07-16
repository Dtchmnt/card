<?php

namespace App\Http\Controllers\AuthUsers;

use App\Http\Requests\AvatarRequest;
use App\Http\Requests\PasswordRequest;
use App\Repositories\EloquentUsersMedia;
use Image;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
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
    public function index()
    {
        $users = Media::whereUserId(auth()->user()->id)->orderByDesc('created_at')->paginate(5);
        return view('home', [
            'users' => $users
        ]);
    }

    public function edit()
    {
        return view('user.edit');
    }

    public function update(PasswordRequest $request)
    {

        Auth::user()->update([
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->back()->withSuccess('Пользователь успешно обновлен');
    }

    public function updateAvatar(EloquentUsersMedia $userEloquent, AvatarRequest $request)
    {
        $userEloquent->updateAvatarAuthUser($request);
        return redirect()->back()->withSuccess('Аватарка успешно изменена');
    }
}
