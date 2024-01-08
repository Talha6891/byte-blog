<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('admin.user-profile.show', compact('user'));
        } else {
            return to_route('login');
        }
    }

    public function update(UpdateProfileRequest $request, string $id)
    {
        $validated = $request->validated();
        $user = User::findOrFail($id);

        if (isset($validated['name'])) {
            $updateData['name'] = $validated['name'];
        }
        if (isset($validated['password'])) {
            $updateData['password'] = Hash::make($validated['password']);
        }
        $user->update($updateData);

        session()->flash('message', 'Profile updated successfully.');
        return back();
    }
}
