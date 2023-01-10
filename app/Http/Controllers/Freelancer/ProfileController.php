<?php

namespace App\Http\Controllers\Freelancer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function edit()
    {

        $user = Auth::user();

        return view('freelancer.profile.edit', [
            'user' => $user,
            'profile' => $user->freelancer,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'first_name' => ['required'],
        ]);

        $user = Auth::user();
        $user->freelancer()->updateOrCreate([], $request->all());

        return redirect()->route('freelancer.profile.edit')
            ->with('success', 'Profile Updated');
    }
}
