<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuTemplate = 'active';
        $results = Template::all(); //variable results bebas penamaan

        return view('pages.templates.index_template', compact('results', 'menuTemplate'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['file' => 'required|mimes:doc,docx|max:5048']);

        $extension = $request->file('file')->extension();

        $nameFile = strtolower(str_replace(' ', '_', $request->jenis_surat)) . '.' . $extension;

        $request->file('file')->put('public/', $nameFile);

        //insert to table
        Template::create([
            'jenis_surat' => $request->jenis_surat,
            'file' => $nameFile
        ]);

        return redirect('templates')->with('status', 'File Has been uploaded successfully in laravel');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Template::find($id);

        //karena semua satu file, jadi ambil juga datanya
        $results = Template::all();
        $menuTemplate = 'active';

        return view('pages.templates.index_template', compact('results', 'edit', 'menuTemplate'));
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
        $db = Template::find($id);

        $db->jenis_surat = $request->jenis_surat;

        if ($request->file('file')) {
            $request->validate(['file' => 'required|mimes:doc,docx|max:5048']);

            //hapus file lama
            File::delete('public/' . $db->file);

            $extension = $request->file('file')->extension();

            $nameFile = strtolower(str_replace(' ', '_', $request->jenis_surat)) . '.' . $extension;

            $request->file('file')->put('public/', $nameFile);

            $db->file = $nameFile;
        }

        $db->update();

        return redirect('templates');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = Template::find($id);

        if ($db->file != null) {

            //hapus file
            Storage::delete('/public/files/' . $db->file);
        }

        $db->delete();

        return redirect('templates');
    }
}
