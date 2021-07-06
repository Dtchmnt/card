<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Social;
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
        $social = Social::where('id', '=', $id)->get();

        return view('admin.users.index',[
            'social' => $social
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Social $social)
    {
        return view('admin.users.show',[
            'social' => $social
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $socials = Social::find($id);
        return view('admin.social.edit',[
            'socials' => $socials
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Social $social,$id)
    {


        $social = Social::find($id);
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
        if ( $request->hasFile('img') )
        {

            $avatar = $request->file('img');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            Image::make($avatar)->resize(300, 300)
                ->save( public_path( '/storage/' ) . $filename );
            $social->img = $filename;
        }
        $social->update();


        return redirect()->back()->withSuccess('Пользователь успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy(Social $social)
    {
        //
    }
}
