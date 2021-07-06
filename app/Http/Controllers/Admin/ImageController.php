<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $path = $request->file('img')->store('uploads','public');

        return redirect('default', ['path'])->back()->withSuccess('Пользователь успешно обновлен');
    }
}
