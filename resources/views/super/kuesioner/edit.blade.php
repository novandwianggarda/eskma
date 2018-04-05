@extends('layouts.master.main2')
@section('content')
{!! Form::model($kuesioner,['route' => ['kuesioner.update',$kuesioner->id],'method'=>'PUT']) !!}
{{Form::token()}}
    //
    @include('super.kuesioner._form',['submit'=>'Edit'])
{!! Form::close() !!}
@endsection