@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="card card-body">
                <h3>Persetujuan</h3>
                <table class='table'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis File</th>
                            <th>File</th>
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
                                <td width="60%">{{ $row->nama_persetujuan }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('persetujuan.edit', $row->id) }}">
                                            <button type="submit" class='btn btn-info'>
                                                <i class="align-middle" data-feather="edit"></i>
                                            </button>
                                        </a>
                                        &nbsp;
                                        <form method="POST" action="{{ route('persetujuan.destroy', $row->id) }}">
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
        <div class="col-md-5">
            <div class="card card-body">
                {{-- jika ada edit --}}
                @if (isset($edit))
                    <h3>Edit Persetujuan</h3>
                    <form class="row g-3" method="post" action="{{ route('persetujuan.update', $edit->id) }}">
                        @method('PUT')
                    @else
                        {{-- jika tidak ada berarti tambah --}}
                        <h3>Tambah Persetujuan</h3>
                        <form class="row g-3" method="post" action="{{ route('persetujuan.store') }}">
                @endif

                @csrf
                <div class="col-auto">
                    <label for="persetujuan" class="visually-hidden">Persetujuan</label>
                    <input type="text" class="form-control" id="jabatan" placeholder="Persetujuan"
                        name="nama_persetujuan"
                        @if (isset($edit)) value="{{ trim($edit->nama_persetujuan) }}" @endif>
                </div>
                <div class="col-auto">
                    @if (isset($edit))
                        <div class="d-flex justify-content-between"></div>
                        <button type="submit" class="btn btn-info mb-3">Update</button>

                        <a href="{{ route('persetujuan.index') }}">
                            <button type="button" class="btn btn-default mb-3">Cancel</button>
                        </a>
                    @else
                        <button type="submit" class="btn btn-primary mb-3">Save</button>
                    @endif

                </div>
                </form>
            </div>

        </div>

    </div>
@endsection
