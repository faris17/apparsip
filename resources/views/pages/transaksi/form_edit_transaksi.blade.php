@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="card card-body">

                <h3>Edit Transaksi</h3>
                <form method="post" action="{{ route('transactions.update', $edit->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group m-3">
                        <label for="nip">Jenis Surat</label>
                        <select name="template_id" class='form-select' required>
                            <option value="">Pilih Jenis Surat</option>
                            @foreach ($templates as $data)
                                <option value="{{ $data->id }}"
                                    @if ($data->id == $edit->template_id) selected='selected' @endif> {{ $data->jenis_surat }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group m-3">
                        <label for="nip">Nomor Surat</label>
                        <input type="text" class="form-control" id="nomor_surat" placeholder="Nomor Surat"
                            name="nomor_surat" value="{{ $edit->nomor_surat }}" required>

                    </div>
                    <div class="form-group m-3">
                        <label for="namaPegawai">Maksud Tujuan</label>
                        <textarea class="form-control" id="maksud_tujuan" placeholder="Maksud dan Tujuan" name="maksud_tujuan" required>{{ $edit->maksud_tujuan }}</textarea>

                    </div>
                    <div class="form-group m-3">
                        <label for="tempat">Tempat</label>
                        <input type="text" class="form-control" id="tempat" placeholder="Tempat" name="tempat"
                            value="{{ $edit->tempat }}">

                    </div>
                    <div class="form-group m-3">
                        <label for="tempat">Tanggal Perjalanan</label>
                        <input type="text" class="form-control" id="tanggal_perjalan"
                            placeholder="Tanggal Perjalanan Dinas" name="tanggal_perjalan"
                            value="{{ $edit->tanggal_perjalan }}" required>
                    </div>

                    <div class="form-group m-3">
                        <label for="tempat">Tanggal Surat</label>
                        <input type="date" class="form-control" id="tanggal_surat_tugas"
                            placeholder="Tanggal Surat Tugas" name="tanggal_surat_tugas"
                            value="{{ $edit->tanggal_surat_tugas }}" required>
                    </div>

                    <div class="form-group m-3">
                        <label for="nip">Persetujuan</label>
                        <select name="persetujuan_id" class='form-select' required>
                            <option value="">Pilih Persetujuan</option>
                            @foreach ($persetujuans as $data)
                                <option value="{{ $data->id }}"
                                    @if ($data->id == $edit->persetujuan_id) selected='selected' @endif>
                                    {{ $data->nama_persetujuan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group m-3">
                        <label for="nip">Nama Yang Menyetujui</label>
                        <select name="nama_persetujuan" class='form-select' required>
                            <option value="">Pilih Nama</option>
                            @foreach ($pegawai as $data)
                                <option value="{{ $data->id }}"
                                    @if ($data->id == $edit->nama_persetujuan) selected='selected' @endif> {{ $data->nama_pegawai }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group m-3">
                        <label for="nip">Pegawai</label>
                        <select name="pegawai_id" class='form-select' required>
                            <option value="">Pilih Pegawai</option>
                            @foreach ($pegawai as $data)
                                <option value="{{ $data->id }}"
                                    @if ($data->id == $edit->pegawai_id) selected='selected' @endif> {{ $data->nama_pegawai }}
                                </option>
                            @endforeach
                        </select>

                    </div>


                    <div class="form-group m-3">

                        <button type="submit" class="btn btn-primary mb-3">Update</button>


                    </div>
                </form>
            </div>

        </div>

    </div>
@endsection
