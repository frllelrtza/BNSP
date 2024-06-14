<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SettingController extends Controller
{
    public function index()
    {
        $profil = Auth::user();
        return view('dashboard.setting.index', compact('profil'));
    }

    public function edit($id)
    {
        $profil = User::findOrFail($id);
        return view('dashboard.setting.edit', compact('profil'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'current_password' => 'required|string',
            'new_password' => 'nullable|string|confirmed',
        ]);

        $profil = User::findOrFail($id);

        // Check if current password matches the one in the database
        if (!Hash::check($request->current_password, $profil->password)) {
            return redirect()->back()->with('error', 'Password saat ini salah.');
        }

        $profil->name = $request->name;
        $profil->email = $request->email;

        // Update password if new password is provided
        if ($request->new_password) {
            $profil->password = Hash::make($request->new_password);
        }

        $profil->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
