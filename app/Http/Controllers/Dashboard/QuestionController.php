<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Level;
use App\Models\Question;
use Illuminate\Http\Request;
use Ghostff\TextToImage\Text;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Ghostff\TextToImage\TextToImage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function generateImage($text, $level, $date)
    {
        $path = storage_path(\public_path('questions/' . $level . '/image/' . hash('md5', $date).".png"));
        // \dd($path);
        $text  = Text::from($text)->position(818/2, 204)
        ->font(28,\public_path('assets/font/Adobe Arabic Regular.otf'))->color(0,0,0);
        

        $text_image = new TextToImage();
        $text_image->setDimension(409,818);
        $text_image->setBackgroundColor( 255,255,255,255);
        $text_image->addTexts($text);
        Storage::disk("public")->put('questions/' . $level . '/image/' . hash('md5', $date).".png",$text_image->render());
        return'public/questions/' . $level . '/image/' . hash('md5', $date).".png";
    }
    public function index(DataTables $datatables, Request $request)
    {
        if ($request->ajax()) {
            return $datatables->of(Question::query()->with(['level']))
                ->addColumn('id', function (Question $quest) {
                    return $quest->id;
                })
                ->addColumn('question', function (Question $quest) {
                    return $quest->question;
                })
                ->addColumn('level', function (Question $quest) {
                    return $quest->level->level;
                })
                ->addColumn('image_question', function (Question $quest) {
                    return $quest->image_question;
                })
                ->addColumn('action', function (Question $quest) {
                    $level = Level::pluck('level', 'id')->all();
                    return \view('dashboard.questions.button_action', compact('quest', 'level'));
                })
                ->addColumn('status', function (Question $quest) {
                    if ($quest->deleted_at) {
                        return 'Inactive';
                    } else {
                        return 'Active';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } else {
            $level = Level::pluck('level', 'id')->all();
            return view('dashboard.questions.index', \compact('level'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'level_id' => 'required',
            'question' => 'required',
            'image_question' => 'required',
        ]);
        $input = $request->all();
        $input['level_id'] = $request->level_id[0] == null ? null : implode("", $input['level_id']);
        $level = Level::where("id", $input['level_id'])->first();
        $input['image_question'] = $this->generateImage(
            $input['image_question'],
            $level->name . '-' . $level->level,
            Carbon::now()
        );
        // dd($request->all());
        Question::create($input);
        return back()->withSuccess('Question created successfully');
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
