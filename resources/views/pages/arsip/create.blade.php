@extends('layouts.app')
@section('content')
<a href="{{route('arsip.index')}}">
    <buton class='btn btn-dark'>Kembali </buton>
</a>

<hr>
<div class="container">
    <form method="post">
    </form>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nomor Surat Tugas</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nomor Surat Tugas">
    </div>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Maksud Tujuan</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nama</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Jabatan</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Tempat</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Tanggal Perjalanan</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Tempat</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>

     <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Tanggal Surat Tugas</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Persetujuan</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nama</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>

    
    <div>
        <button type="submit" name="save" class='btn btn-primary form-control'>CREATE SURAT TUGAS</button>
    </div>
</div>
@endsection
