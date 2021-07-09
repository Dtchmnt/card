<?php

namespace App\Http\Controllers\AuthUsers;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\User;
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

    public function update(Request $request, Media $social)
    {

        $social = Media::where('user_id', Auth::user()->id)->first();
        $social->first_name = $request->first_name;
        $social->last_name = $request->last_name;
        $social->description = $request->description;
        $social->email = $request->email;
        $social->img = $request->img;
        $social->phone = $request->phone;
        $social->telegram = $request->telegram;
        $social->whats = $request->whats;
        $social->viber = $request->viber;
        $social->facebook = $request->facebook;
        $social->instagram = $request->instagram;
        $social->in = $request->in;
        $social->vk = $request->vk;
        $social->youtube = $request->youtube;
        $social->user_id = Auth::user()->id;
        if ($request->hasFile('img')) {
            $avatar = $request->file('img');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)
                ->save(public_path('/storage/') . $filename);
            $social->img = $filename;
        }
        $social->update();
        return redirect()->back()->withSuccess('Пользователь успешно обновлен');
    }
}
