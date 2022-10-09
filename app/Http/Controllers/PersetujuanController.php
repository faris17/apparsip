<?php

namespace App\Http\Controllers;

use App\Models\Persetujuan;
use Illuminate\Http\Request;

class PersetujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuPersetujuan = 'active';
        $results = Persetujuan::all(); //variable results bebas penamaan

        return view('pages.persetujuan.index_persetujuan', compact('results', 'menuPersetujuan'));
    }

    public function store(Request $request)
    {
        Persetujuan::create($request->all()); //artinya ambil semua inputan
        //setelah save, direct kembali ke index
        return redirect()->route('persetujuan.index');
    }

    public function edit($id)
    {
        $edit = Persetujuan::find($id);

        //karena semua satu file, jadi ambil juga datanya
        $results = Persetujuan::all();
        $menuPersetujuan = 'active';

        return view('pages.persetujuan.index_persetujuan', compact('results', 'edit', 'menuPersetujuan'));
    }


    public function update(Request $request, $id)
    {
        $db = Persetujuan::find($id);

        $db->nama_persetujuan = $request->nama_persetujuan;

        $db->update();
        return redirect()->route('persetujuan.index');
    }


    public function destroy($id)
    {
        $db = Persetujuan::find($id); //temukan datanya dulu, lalu delete

        if ($db) {
            $db->delete();
        }

        //and direct ke index
        return redirect()->route('persetujuan.index');
    }
}
