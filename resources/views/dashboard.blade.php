@extends('layouts.app')
@section('content')
<a href="{{route('arsip.create')}}">
<button class='btn btn-primary'>Tambah</button>
</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nomor Surat Tugas</th>
      <th scope="col">Nomor SPD</th>
      <th scope="col">Nama</th>
      <th scope="col">Kegiatan</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
@endsection