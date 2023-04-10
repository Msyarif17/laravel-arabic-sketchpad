<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CompleteRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Role::where('name', '!=', 'Super Admin')->pluck('name', 'id')->all();
        $user = Auth::user();
        // dd($user);
        return view('auth.complete-registration', \compact('role', 'user'));
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
        $user = User::find(Auth::user()->id);
        $input = $request->all();
        $image = $request->file('avatar');
        // dd($input);
        $input['password'] = $input['password'] ? Hash::make($input['password']) : $user->password;
        if ($input['role_id'][0] != null) {
            $role = Role::find((int)implode('', $input['role_id']));
            $user->syncRoles([$role->name]);
        }
        if ($image) {
            $image->storeAs('public/avatar/', $user->id . '-' . $image->hashName());
            $input['avatar'] = '/avatar/' . $user->id . '-' . $image->hashName();
        }
        $user->update($input);
        return \redirect()->intended('/main');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
