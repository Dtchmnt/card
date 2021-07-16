<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MediaController extends Controller
{
    public function index(Media $social, $id)
    {

    }

    public function findById($slug)
    {

        $media = Media::whereSlug($slug)->firstOrFail();
        return view('card.index',[
            'media' => $media
        ]);

    }
}
