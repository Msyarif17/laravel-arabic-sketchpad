<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Level;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index(DataTables $datatables, Request $request)
    {
        if ($request->ajax()) {
            return $datatables->of(Level::query())
                ->addColumn('id', function (Level $level) {
                    return $level->id;
                })
                ->addColumn('name', function (Level $level) {
                    return $level->name;
                })
                
                ->addColumn('level', function (Level $level) {
                    return $level->level;
                })
                ->addColumn('action', function (Level $level) {
                    return \view('dashboard.level.button_action', compact('level'));
                })
                ->addColumn('status', function (Level $level) {
                    if ($level->deleted_at) {
                        return 'Inactive';
                    } else {
                        return 'Active';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } else {

            return view('dashboard.level.index');
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
        $request->validate([
            'name' => 'required',
            'level' => 'required',
            'description' => 'required',
        ]);
        // dd(Level::create($request->all()));
        Level::create($request->all());
        return back()->withSuccess('Level created successfully');
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
        return Level::where('id', $id)->first();

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'level' => 'required',
            'description' => 'required',
        ]);
        // dd(Level::create($request->all()));
        Level::find($id)->update($request->all());
        return back()->withSuccess('Level created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Level::find($id)->delete();
        return back()->withSuccess('Level deleted successfully');
    }
}
