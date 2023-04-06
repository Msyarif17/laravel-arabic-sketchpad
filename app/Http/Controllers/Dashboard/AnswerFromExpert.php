<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerFromExpert extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function generateImage($text,$id,$level,$date){
        $path = storage_path('public/questions/'.$level.'/image/'.$id.'-'.hash('md5',$date));

        $img = Image::make($path);

        $img->text($text,818,409, function ($font) {
            $font->file(public_path('assets/fonts/arial.ttf'));
            $font->size(54);
            $font->color('#');
            $font->align('center');
            $font->valign('middle');
            $font->angle(0);
        });

        $img->save($path);
        return $path;
    }
    public function index()
    {
        $quest = Question::with(['level'])->get();
        foreach($quest as )
        $quest->image_question = $this->generateImage(
            $quest->image_question,
            $quest->id,
            $quest->level->name.'-'.$quest->level->level,
            $quest->created_at
        );
        return view('dashboard.answers.index',compact('quest'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
