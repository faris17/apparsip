@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div style="text-align: end">
                <a href="{{ route('transactions.create') }}"><button class="btn btn-primary">Tambah</button></a>
            </div>

            <div class="card card-body">
                <h3>Pegawai</h3>
                <table class='transaksi-table'>
                </table>
            </div>

        </div>

    </div>
@endsection

@push('scriptjs')
    {!! $dataTable->scripts() !!}
@endpush
