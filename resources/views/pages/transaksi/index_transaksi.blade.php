@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('notif')
            <div style="text-align: end">
                <a href="{{ route('transactions.create') }}"><button class="btn btn-primary">Tambah</button></a>
            </div>

            <h3>Arsip</h3>
            <div class="card card-body table-responsive">
                {!! $dataTable->table() !!}
            </div>

        </div>

    </div>
    {!! $dataTable->scripts() !!}
@endsection

@push('scriptjs')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            $('.alert').click(function() {
                $(this).hide(300);
            });
        })
    </script>
@endpush
