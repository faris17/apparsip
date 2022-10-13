<?php

namespace App\Http\Controllers;

use App\DataTables\TransaksiDataTable;
use App\Models\Pegawai;
use App\Models\Persetujuan;
use App\Models\Template;
use App\Models\Transaksi;
use Exception;
use Illuminate\Http\Request;


class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TransaksiDataTable $dataTable)
    {
        $menuTransaksi = 'active';
        return $dataTable->render('pages.transaksi.index_transaksi', compact('menuTransaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menuTransaksi = 'active';
        $templates = Template::all();
        $persetujuans = Persetujuan::all();
        $pegawai = Pegawai::all();

        return view('pages.transaksi.form_transaksi', compact('menuTransaksi', 'templates', 'persetujuans', 'pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Transaksi::create($request->all());

            $this->saveWord($request);

            return redirect()->route('transactions.index');
        } catch (Exception $e) {
        }
    }

    public function saveWord(Request $request)
    {

        //get name file from template
        $template = Template::select('file')->find($request->template_id);

        // Creating the new document...
        $phpWord = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/public/files/' . $template->file));

        $nomor_surat = $request->nomor_surat;

        //get nama pegawai
        $pegawai = Pegawai::with('jabatan')->find($request->pegawai_id);
        //get persetujuan
        $persetujuan = Persetujuan::find($request->persetujuan_id);
        //get nama yang menyetujuai
        $disetujui = Pegawai::with('jabatan')->find($request->nama_persetujuan);

        $phpWord->setValues([
            'nomor_surat' => $nomor_surat,
            'maksud_tujuan' => $request->maksud_tujuan,
            'tempat' => $request->tempat,
            'nama_pegawai' => $pegawai->nama_pegawai,
            'jabatan' => $pegawai->jabatan->name,
            'tanggal_surat' => $request->tanggal_surat_tugas,
            'menyetujui' => $disetujui->jabatan->name,
            'tanda_tangan' => $disetujui->nama_pegawai

        ]);

        $namefile = trim($nomor_surat);

        $phpWord->saveAs('files/' . $namefile . '.docx');
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
        $edit = Transaksi::find($id);
        $templates = Template::all();
        $persetujuans = Persetujuan::all();
        $pegawai = Pegawai::all();

        return view("pages.transaksi.form_edit_transaksi", compact('edit', 'templates', 'persetujuans', 'pegawai'));
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
        $db = Transaksi::find($id);

        $db->nomor_surat = $request->nomor_surat;
        $db->maksud_tujuan = $request->maksud_tujuan;
        $db->tempat = $request->tempat;
        $db->tanggal_perjalan = $request->tanggal_perjalan;
        $db->tanggal_surat_tugas = $request->tanggal_surat_tugas;
        $db->nama_persetujuan = $request->nama_persetujuan;
        $db->persetujuan_id = $request->persetujuan_id;
        $db->template_id = $request->template_id;
        $db->pegawai_id = $request->pegawai_id;

        if ($db->update()) {
            $this->saveWord($request);
        }


        return redirect()->route('transactions.index')->with(['success' => "Berhasil Update"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = Transaksi::find($id);

        if ($db) {
            $db->delete();

            return redirect()->route('transactions.index')->with(['success' => "Berhasil Delete"]);
        }
    }

    public function download($id)
    {

        $db = Transaksi::select('nomor_surat')->find($id);

        $namefile = trim($db->nomor_surat);


        return response()->download(public_path('files/' . $namefile . '.docx'));
    }
}
