<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuJabatan = 'active';
        $results = Jabatan::all(); //variable results bebas penamaan

        return view('pages.jabatan.index_jabatan', compact('results', 'menuJabatan'));
    }

    public function store(Request $request)
    {
        Jabatan::create($request->all()); //artinya ambil semua inputan
        //setelah save, direct kembali ke index
        return redirect()->route('jabatan.index');
    }

    public function edit($id)
    {
        $edit = Jabatan::find($id);

        //karena semua satu file, jadi ambil juga datanya
        $results = Jabatan::all();
        $menuJabatan = 'active';

        return view('pages.jabatan.index_jabatan', compact('results', 'edit', 'menuJabatan'));
    }


    public function update(Request $request, $id)
    {
        $db = Jabatan::find($id);

        $db->name = $request->name;

        $db->update();
        return redirect()->route('jabatan.index');
    }


    public function destroy($id)
    {
        $db = Jabatan::find($id); //temukan datanya dulu, lalu delete

        if ($db) {
            $db->delete();
        }

        //and direct ke index
        return redirect()->route('jabatan.index');
    }
}
