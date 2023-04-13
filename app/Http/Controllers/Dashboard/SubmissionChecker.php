<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Level;
use Illuminate\Http\Request;
use App\Models\AnswerFromExpert;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SubmissionChecker extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DataTables $datatables, Request $request)
    {
        $answers = AnswerFromExpert::with([
            'question' => function ($q) {
                $q->with(['level']);
            },
            'user',
        ]);
        if ($request->ajax()) {
            return $datatables->of($answers)
                ->addColumn('id', function (AnswerFromExpert $answer) {
                    return $answer->id;
                })
                ->addColumn('user_name', function (AnswerFromExpert $answer) {
                    return $answer->user->name;
                })
                ->addColumn('question', function (AnswerFromExpert $answer) {
                    return $answer->question->question;
                })
                ->addColumn('level', function (AnswerFromExpert $answer) {
                    return$answer->question->level->name." ".$answer->question->level->level;
                })
                ->addColumn('image_question', function (AnswerFromExpert $answer) {
                    $answer = $answer->question->image_question;
                    return \view('dashboard.submission-check.image', compact('answer'));
                })
                ->addColumn('image_answers', function (AnswerFromExpert $answer) {
                    $answer = "/" . $answer->image_answers;
                    return \view('dashboard.submission-check.image', compact('answer'));
                })
                ->addColumn('action', function (AnswerFromExpert $answer) {
                    return \view('dashboard.submission-check.button_action', compact('answer'));
                })
                ->addColumn('status', function (AnswerFromExpert $answer) {
                    if ($answer->is_accepted == 0) {
                        return 'Waiting for Accepted';
                    } else if ($answer->is_accepted == 1) {
                        return 'Accepted';
                    } else {
                        return 'Rejected';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } else {

            $submissions = $answers->where('is_accepted', 0)->paginate(1);

            return view('dashboard.submission-check.index', compact('submissions'));
        }
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $answer = AnswerFromExpert::find($id);
        $img = 'public' . $answer->toArray()['image_answers'];
        if (Storage::exists($img)) {
            Storage::delete([$img]);
        }

        $answer->delete();
        return back()->withSuccess('Deleted successfully');
    }
    public function accept(Request $request)
    {
        AnswerFromExpert::accept($request->id);
    }
    public function reject(Request $request)
    {
        // return $request;
        AnswerFromExpert::reject($request->id);
    }
}
