@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="card card-body">

                <h3>Edit Pegawai</h3>
                <form method="post" action="{{ route('pegawai.update', $edit->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group m-3">
                        <label for="nip" class="visually-hidden">NIP</label>
                        <input type="text" class="form-control" id="nip" placeholder="NIP" name="nip"
                            value="{{ $edit->nip }}" required>

                    </div>
                    <div class="form-group m-3">
                        <label for="namaPegawai" class="visually-hidden">Nama Pegawai</label>
                        <input type="text" class="form-control" id="nama_pegawai" placeholder="Nama Pegawai"
                            name="nama_pegawai" value="{{ $edit->nama_pegawai }}" required>

                    </div>

                    <div class="form-group m-3">
                        <label for="golongan" class="visually-hidden">Golongan</label>
                        <select class="form-select" name="golongan_id">
                            @foreach ($golongans as $row)
                                <option value="{{ $row->id }}" @if ($row->id == $edit->golongan_id) selected @endif>
                                    {{ $row->nama_golongan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group m-3">
                        <label for="jabatan" class="visually-hidden">Jabatan</label>
                        <select class="form-select" name="jabatan_id">
                            @foreach ($jabatans as $row)
                                <option value="{{ $row->id }}" @if ($row->id == $edit->jabatan_id) selected @endif>
                                    {{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group m-3">

                        <button type="submit" class="btn btn-info mb-3">Update</button>


                    </div>
                </form>
            </div>

        </div>

    </div>
@endsection
