<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();

        return view('siswa.index', [
            'title' => 'Data Siswa',
            'siswa' => $siswa,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create', [
            'title' => 'Tambah Data Siswa'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'max:255'],
            'alamat'    => ['required', 'string', 'max:255'],
            'notelp'    => ['required', 'string', 'max:255'],
        ]);

        Siswa::create($data);

        return redirect()->route('siswa.index')->with([
            'alert-content' => 'Data siswa berhasil dibuat!',
            'alert-type'    => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', [
            'title' => 'Edit Data Siswa',
            'siswa' => $siswa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $data = $request->validate([
            'nama'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'max:255'],
            'alamat'    => ['required', 'string', 'max:255'],
            'notelp'    => ['required', 'string', 'max:255'],
        ]);

        $siswa->update($data);

        return redirect()->route('siswa.index')->with([
            'alert-content' => 'Data siswa berhasil diubah!',
            'alert-type'    => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        Siswa::destroy($siswa->id_siswa);

        return back()->with([
            'alert-content' => 'Data siswa berhasil dihapus!',
            'alert-type'    => 'success',
        ]);
    }
}
