@extends('layouts.app')
@section('content')
    <div class="row">
        @include('pages.templates.form_template')

        <div class="col-md-12">
            <div class="card card-body">
                <h3>Template</h3>
                <hr>
                <table class='table'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Surat</th>
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
                                <td>{{ $row->jenis_surat }}</td>
                                <td>{{ $row->file }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('templates.edit', $row->id) }}">
                                            <button type="submit" class='btn btn-info'>
                                                <i class="align-middle" data-feather="edit"></i>
                                            </button>
                                        </a>
                                        &nbsp;
                                        <form method="POST" action="{{ route('templates.destroy', $row->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class='btn btn-danger'
                                                onclick="return confirm('are you sure?')">
                                                <i class="align-middle" data-feather="trash"></i>
                                            </button>

                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan='4'>Tidak ada Data</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>


    </div>
@endsection
