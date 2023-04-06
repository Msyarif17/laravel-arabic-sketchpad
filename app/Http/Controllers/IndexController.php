<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\answerFromUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index()
    {
        return view('main');
    }
    public function submit(Request $request)
    {
        $request->validate([
            'image_answer' => 'required'
        ]);
        $image = $request->only('image_answer');
        $image = $image['image_answer'];
        $extension = explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];   // .jpg .png .pdf

        $replace = substr($image, 0, strpos($image, ',') + 1);

        // find substring fro replace here eg: data:image/png;base64,

        $image = str_replace($replace, '', $image);

        $image = str_replace(' ', '+', $image);

        $imageName = hash('md5', Str::random(10)) . '.' . $extension;
        // return $imageName;
        Storage::disk('public')->put($imageName, base64_decode($image));
        // answerFromUser::create($input);
        return 'Horeee Jawaban mu Benar';
    }
}
