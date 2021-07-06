<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */

    public function index()
    {
        $users = Social::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.users.index',[
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $inputArray = array(
            'name' => $request['name'],
            'password' => Hash::make($request['password']),
        );

        // Сохраняем все это в базу данных и ташим id
        $id = User::create($inputArray)->assignRole('user')->id;
        // Создаем в медиа по id из юзеров табличку медиа
        Social::create([
            'user_id' => $id,
        ]);
        //сообщением о том какие мы молодыы
        return redirect()->back()->withSuccess('Пользователь успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param User $users
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function show(Social $media, $id)
    {

        $media = Social::find($id);
        return view('admin.users.show',[
            'media' => $media
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $users
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Ищем id
        $users = User::find($id);
        //возвращаем эдит форму и подставляем
        return view('admin.users.edit',[
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $users, $id)
    {
        //этот надо будет править
        if ($request->change_password) {
            $request->input('password');
            $paswword = Hash::make($request['password']);
            $name = $request->input('name');
            DB::update('update users set password = ?, name = ? where id = ?',[$paswword,$name,$id]);
        } else {
            $name = $request->input('name');
            DB::update('update users set name = ? where id = ?',[$name,$id]);
        }

        return redirect()->back()->withSuccess('Пользователь успешно обновлен');
    }

    /**
     * @param Request $request
     * @param User $users
     * @param $id
     * @return mixed
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $users, $id)
    {
//Ташим юзера по ид и удаляем его нахуй к чертям
        User::find($id)->delete();
//мы молодцы говорит тут
        return redirect()->back()->withSuccess('Пользователь успешно удален');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $users = Social::where('first_name', 'LIKE', "%{$search}%")->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.users.index',[
            'users' => $users
        ]);
    }
}
