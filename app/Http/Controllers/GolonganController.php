<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuGolongan = 'active';
        $results = Golongan::all(); //variable results bebas penamaan

        return view('pages.golongan.index_golongan', compact('results', 'menuGolongan'));
    }

    public function store(Request $request)
    {
        Golongan::create($request->all()); //artinya ambil semua inputan
        //setelah save, direct kembali ke index
        return redirect()->route('golongan.index');
    }

    public function edit($id)
    {
        $edit = Golongan::find($id);

        //karena semua satu file, jadi ambil juga datanya
        $results = Golongan::all();
        $menuGolongan = 'active';

        return view('pages.golongan.index_golongan', compact('results', 'edit', 'menuGolongan'));
    }


    public function update(Request $request, $id)
    {
        $db = Golongan::find($id);

        $db->nama_golongan = $request->nama_golongan;

        $db->update();
        return redirect()->route('golongan.index');
    }


    public function destroy($id)
    {
        $db = Golongan::find($id); //temukan datanya dulu, lalu delete

        if ($db) {
            $db->delete();
        }

        //and direct ke index
        return redirect()->route('golongan.index');
    }
}
