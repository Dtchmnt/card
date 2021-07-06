<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $users_count = User::all()->count();

        return view('admin.home.index', [
            'users_count' => $users_count
        ]);
    }
}
