@extends('layouts.master.main')
@section('content')    
    <h2>Kuesioner</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>UPP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kuesioner as $k)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$k->pertanyaan}}</td>
                    <td>{{$k->upp->nama}}</td>
                    <td>
                        <a href="{{route('kuesioner.edit',['id'=>$k->id])}}" class="btn btn-primary" data-toggle="tooltip" title="Lihat Kuesioner">Edit</a>
                        <a href="" class="btn btn-danger" data-toggle="tooltip" title="Lihat Kuesioner">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection