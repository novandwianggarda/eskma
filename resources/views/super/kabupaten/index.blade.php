@extends('layouts.master.main')
@section('content')    
    <h2>Kabupaten</h2>
    <a href="{{ url('kabupaten/tambah')}}" class="btn btn-primary" style="margin-bottom: 20px;">Tambah</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Kab</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection