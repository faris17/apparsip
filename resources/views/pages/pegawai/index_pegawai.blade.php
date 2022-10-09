@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div style="text-align: end">
                <a href="{{ route('pegawai.create') }}"><button class="btn btn-primary">Tambah</button></a>
            </div>

            <div class="card card-body">
                <h3>Pegawai</h3>
                <table class='table'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>NAMA</th>
                            <th>JABATAN</th>
                            <th>GOLONGAN</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($results as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->nip }}</td>
                                <td>{{ $row->nama_pegawai }}</td>
                                <td>{{ $row->jabatan_id }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('pegawai.edit', $row->id) }}">
                                            <button type="submit" class='btn btn-info'>
                                                <i class="align-middle" data-feather="edit"></i>
                                            </button>
                                        </a>
                                        &nbsp;
                                        <form method="POST" action="{{ route('pegawai.destroy', $row->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class='btn btn-danger'>
                                                <i class="align-middle" data-feather="trash"></i>
                                            </button>

                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan='2'>Tidak ada Data</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>

    </div>
@endsection
