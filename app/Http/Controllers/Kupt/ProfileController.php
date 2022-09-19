<?php

namespace App\Http\Controllers\Kupt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit()
    {
       return view('kupt.edit-profile');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'password' => 'required| min:5| max:7 |confirmed',
            'password_confirmation' => 'required| min:5'
        ]);
        $user = User::find($id);
        $user->name = $request['name'];
        $user->password = bcrypt($request['password']);
        $user->save();

        return redirect()->back()->with('message', 'Profile anda berhasil diupdate!');
    }
}
