<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index(Social $social, $id)
    {

    }

    public function findById(Social $social, $id)
    {
        $media = Social::find($id);
//возвращаем эдит форму и подставляем данные пиздец бля
        return view('card.index',[
            'media' => $media
        ]);
    }
}
