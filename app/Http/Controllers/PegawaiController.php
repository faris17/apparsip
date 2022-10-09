<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuPegawai = 'active';
        $results = Pegawai::all(); //karena pegawai dibawah 50, tidak usah pakai pagination

        return view('pages.pegawai.index_pegawai', compact('results', 'menuPegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menuPegawai = 'active';
        //ambil data jabatan dan golongan.
        $jabatans = Jabatan::all();
        $golongans = Golongan::all();

        return view('pages.pegawai.form_pegawai', compact('jabatans', 'golongans', 'menuPegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pegawai' => 'required',
            'nip' => 'required|numeric'
        ]);

        Pegawai::create($request->all());

        return redirect()->route('pegawai.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menuPegawai = 'active';
        //ambil data jabatan dan golongan.
        $jabatans = Jabatan::all();
        $golongans = Golongan::all();

        //get data pegawai
        $edit = Pegawai::find($id);

        return view('pages.pegawai.form_edit_pegawai', compact('jabatans', 'golongans', 'edit', 'menuPegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $db = Pegawai::find($id);

        $db->nip = $request->nip;
        $db->nama_pegawai = $request->nama_pegawai;
        $db->jabatan_id = $request->jabatan_id;
        $db->golongan_id = $request->golongan_id;

        $db->update();

        return redirect()->route('pegawai.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = Pegawai::find($id);

        if ($db) {
            $db->delete();
        }

        return redirect()->route('pegawai.index');
    }
}
