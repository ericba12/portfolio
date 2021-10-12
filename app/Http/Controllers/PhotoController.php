<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;

class PhotoController extends Controller
{
    public function upload(){
        return view('photo/upload');
    }

    public function store(ImageRequest $request){                           //pas la meme fonction store
        $request->image->store(config('images/path', 'public'));
        return view('photo/store');
    }
}
