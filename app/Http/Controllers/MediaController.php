<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index(Media $social, $id)
    {

    }

    public function findById(Media $social, $id)
    {
        $media = Media::findOrFail($id);
        return view('card.index',[
            'media' => $media
        ]);

    }
}
