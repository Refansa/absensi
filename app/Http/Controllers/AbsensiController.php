<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absensi = Absensi::all();

        return view('absensi.index', [
            'title'     => 'Data Absensi',
            'absensi'   => $absensi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::all();

        return view('absensi.create', [
            'title' => 'Tambah Data Absen',
            'siswa' => $siswa,
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
            'id_siswa'      => ['required', 'numeric'],
            'keterangan'    => ['required', 'string', 'max:255'],
            'tanggal'       => ['required', 'date'],
        ]);

        Absensi::create($data);

        return redirect()->route('absensi.index')->with([
            'alert-content' => 'Data absen berhasil dibuat!',
            'alert-type'    => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $absensi)
    {
        $siswa = Siswa::all();

        return view('absensi.edit', [
            'title'     => 'Edit Data Absen',
            'absensi'   => $absensi,
            'siswa'     => $siswa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absensi $absensi)
    {
        $data = $request->validate([
            'id_siswa'      => ['required', 'numeric'],
            'keterangan'    => ['required', 'string', 'max:255'],
            'tanggal'       => ['required', 'date'],
        ]);

        $absensi->update($data);

        return redirect()->route('absensi.index')->with([
            'alert-content' => 'Data absen berhasil diubah!',
            'alert-type'    => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absensi $absensi)
    {
        Absensi::destroy($absensi->id_absen);

        return back()->with([
            'alert-content' => 'Data absen berhasil dihapus!',
            'alert-type'    => 'success',
        ]);
    }
}
