@extends('layouts.master.main')
@section('index-content')

<div class="box-body">
          <a href="kabupaten/create" class="btn btn-primary">Add</a>
          <br>
          <br>
        <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Password</th>
                <th data-orderable="false" data-searchable="false">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($users as $us)
              <tr>
                <td>{{ $us->id }}</td>
                <td>{{ $us->name }}</td>
                <td>{{ $us->email }}</td>
                <td>{{ $us->password }}</td>
                <td>
                <a href="" class="btn btn-success btn-xs">Edit</a>
                  {!! Form::open(['method'=>'delete', 'route'=>['kabupaten.destroy', $us->id], 'style' => 'display: inline-block;']) !!}
                  {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-xs', 'onclick'=>'return confirm("Do you want to delete this product ?")']) !!}
                  {!! Form::close() !!}
                </td>
              </tr>
            @endforeach
            </tbody> 
        </table>
      </div>

@stop