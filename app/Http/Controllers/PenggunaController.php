<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengguna = User::all();
        return view('pengguna.index', compact('pengguna'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'foto_diri' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $foto_diri = null;

        if ($request->hasFile('foto_diri')) {
            $file = $request->file('foto_diri');
            $path = $file->store('public/photos');
            $foto_diri = basename($path);
        }

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'role' => $validatedData['role'],
            'foto_diri' => $foto_diri,
        ]);

        return redirect()->route('pengguna.index')->with('success', 'Akun pengguna berhasil dibuat.');
    }

    public function destroy(User $pengguna)
    {
        $pengguna->delete();

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil dihapus.');
    }

    public function show(User $pengguna)
    {
        return view('pengguna.show', compact('pengguna'));
    }
}
