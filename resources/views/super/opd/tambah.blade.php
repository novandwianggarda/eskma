@extends('layouts.master.main3')
@section('content')
{!! Form::model($user,['route' => 'opd.store','method'=>'POST']) !!}
{{Form::token()}}
    //
    @include('super.opd._form',['submit'=>'Tambah'])
{!! Form::close() !!}
@endsection