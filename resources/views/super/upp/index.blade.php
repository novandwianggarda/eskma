@extends('layouts.master.main')
@section('content')    
    <h2>UPP</h2>
    <a href="{{ url('upp/tambah')}}" class="btn btn-primary" style="margin-bottom: 20px;">Tambah</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users->upp as $upp)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$upp->nama}}</td>
                    <td>
                        <a href="" class="btn btn-primary" data-toggle="tooltip" title="Lihat Kuesioner">Lihat</a>
                        <a href="" class="btn btn-light" data-toggle="tooltip" title="Lihat Kuesioner">Edit</a>
                        <a href="" class="btn btn-danger" data-toggle="tooltip" title="Lihat Kuesioner">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection