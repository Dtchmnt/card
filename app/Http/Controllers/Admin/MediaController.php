<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
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

        return view('admin.users.index',[
            'social' => $social
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Media  $social
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Media $social)
    {
        return view('admin.users.show',[
            'social' => $social
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Media  $social
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $socials = Media::find($id);
        return view('admin.social.edit',[
            'socials' => $socials
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Media  $social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $social, $id)
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
        $social->vk = $request->vk;
        $social->youtube = $request->youtube;
        $social->in = $request->in;
        if ( $request->hasFile('img') )
        {

            $avatar = $request->file('img');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            Image::make($avatar)->save( public_path( '/storage/' ) . $filename );

            $social->img = $filename;
        }
        $social->update();

        return redirect()->back()->withSuccess('Пользователь успешно обновлен');
    }
}
