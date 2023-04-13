<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use Carbon\Carbon;
use App\Models\Level;
use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\AnswerFromExpert as AnswerFromExpertModel;

class AnswerFromExpert extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index(Request $request)
    {
        // $answer = AnswerFromExpertModel::where('user_id', Auth::user()->id);
        $quest = Level::with(['question'=>function($q){
                    $q->with(['answer_from_experts'=>function($q){
                        $q->where('user_id', Auth::user()->id);
                    }]);
                }])
                ->withCount('question')
                ->has('question', '>', 0)
                ->orderBy('level')
                ->paginate(1);
        if($request->ajax()){
            $quest = Question::with(['answer_from_experts'=>function($q){
                $q->where('user_id', Auth::user()->id);
            }])->find((int) $request->id);
            return $quest;
        }
        return view('dashboard.answers.index',\compact('quest'));
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
        $request->validate([
            'image_answer' => 'required',
            'quest_id'=>'required',
        ]);
        try{

            $input = $request->all();
            $image = $input['image_answer'];
            $extension = explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];   // .jpg .png .pdf
    
            $replace = substr($image, 0, strpos($image, ',') + 1);
    
            // find substring fro replace here eg: data:image/png;base64,
    
            $image = str_replace($replace, '', $image);
    
            $image = str_replace(' ', '+', $image);
    
            $imageName = 'user-'.Auth::user()->id.'-'.hash('md5', Carbon::now()) . '.jpg';
    // return $input;
            $quest = Question::with(['level'])->find((int)$input['quest_id']);
            // return $quest;
            $path = 'answers/'.$quest->level->name . '-' . $quest->level->level. '/image/' .$imageName;
            $data = [
                'question_id' => $quest->id,
                'image_answers' => $path,
                'user_id' => Auth::user()->id
            ];
            AnswerFromExpertModel::create($data);
            Storage::disk('public')->put($path, base64_decode($image));
            // answerFromUser::create($input);
            return response()->json([
                'status' => 'success',
                'data' => [
                    'id'=>$quest->id
                ],
                'msg'=>'Jawaban mu sudah dikirim, Tunggu Admin Konfirmasi ya',
            ]);
        }catch(Exception $e){
            return $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    
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
