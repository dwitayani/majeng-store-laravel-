<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggan'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'NIK' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'foto_diri' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $foto_diri = null;

        if ($request->hasFile('foto_diri')) {
            $file = $request->file('foto_diri');
            $path = $file->store('public/photos');
            $foto_diri = basename($path);
        }

        Pelanggan::create([
            'nama' => $request->nama,
            'NIK' => $request->NIK,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'foto_diri' => $foto_diri,
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function show(Pelanggan $pelanggan)
    {
        return view('pelanggan.show', compact('pelanggan'));
    }

    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $request->validate([
            'nama' => 'required',
            'NIK' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'foto_diri' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $foto_diri = null;

        if ($request->hasFile('foto_diri')) {
            $file = $request->file('foto_diri');
            $path = $file->store('public/photos');
            $foto_diri = basename($path);
        }

        // Lakukan pembaruan data pelanggan
        $pelanggan->update([
            'nama' => $request->nama,
            'NIK' => $request->NIK,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'foto_diri' => $foto_diri,
        ]);

        // Redirect kembali ke halaman daftar pelanggan dengan pesan sukses
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui.');
    }


    public function destroy(Pelanggan $pelanggan)
    {
        // Hapus record pelanggan dari database
        $pelanggan->delete();

        // Jika pelanggan memiliki foto_diri, hapus file foto dari penyimpanan
        if ($pelanggan->foto_diri) {
            Storage::delete('public/images/' . $pelanggan->foto_diri);
        }

        // Redirect ke halaman daftar pelanggan dengan pesan sukses
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.');
    }
}
