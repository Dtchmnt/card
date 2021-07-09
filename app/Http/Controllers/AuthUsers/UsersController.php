<?php

namespace App\Http\Controllers\AuthUsers;

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

    public function update(Request $request)
    {
        if ($request->change_password) {
            Auth::user()->update([
                'name' => $request->input('name'),
                'password' => Hash::make($request['password']),
            ]);
        } else {
            Auth::user()->update([
                'name' => $request->input('name'),
            ]);
        }
        return redirect()->back()->withSuccess('Пользователь успешно обновлен');
    }
}
