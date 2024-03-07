<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validate the user's registration data
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'namaLengkap' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,petugas',
            'foto_diri' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $foto_diri = null;
        if ($request->hasFile('foto_diri')) {
            $file = $request->file('foto_diri');
            $path = $file->store('public/photos');
            $foto_diri = basename($path);
        }

        // Create a new user instance
        $user = new User();
        $user->username = $validatedData['username'];
        $user->namaLengkap = $validatedData['namaLengkap'];
        $user->alamat = $validatedData['alamat'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->role = $validatedData['role'];
        $user->foto_diri = $foto_diri;
        $user->save();

        // Log the user in
        // auth()->login($user);

        // Redirect the user after registration
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silahkan Login.');
    }
}