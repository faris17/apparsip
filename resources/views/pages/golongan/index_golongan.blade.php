@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="card card-body">
                <h3>Golongan</h3>
                <table class='table'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
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
                                <td width="60%">{{ $row->nama_golongan }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('golongan.edit', $row->id) }}">
                                            <button type="submit" class='btn btn-info'>
                                                <i class="align-middle" data-feather="edit"></i>
                                            </button>
                                        </a>
                                        &nbsp;
                                        <form method="POST" action="{{ route('golongan.destroy', $row->id) }}">
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
                    <h3>Edit Golongan</h3>
                    <form class="row g-3" method="post" action="{{ route('golongan.update', $edit->id) }}">
                        @method('PUT')
                    @else
                        {{-- jika tidak ada berarti tambah --}}
                        <h3>Tambah Golongan</h3>
                        <form class="row g-3" method="post" action="{{ route('golongan.store') }}">
                @endif

                @csrf
                <div class="col-auto">
                    <label for="golongan" class="visually-hidden">Golongan</label>
                    <input type="golongan" class="form-control" id="golongan" placeholder="Golongan" name="nama_golongan"
                        @if (isset($edit)) value="{{ trim($edit->nama_golongan) }}" @endif>
                </div>
                <div class="col-auto">
                    @if (isset($edit))
                        <div class="d-flex justify-content-between"></div>
                        <button type="submit" class="btn btn-info mb-3">Update</button>

                        <a href="{{ route('golongan.index') }}">
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
