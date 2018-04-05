@extends('layouts.master.main')
@section('content')
{!! Form::open(['route' => 'jawab.store', 'files' => true]) !!}
	@foreach($kuesioner as $k)
	<div class="form-group">
		<label for="kues[]">{{$k->pertanyaan}}</label>
		<select name="kues[]" class="form-control">
			<option value="0">A</option>
			<option value="1">B</option>
			<option value="2">C</option>
		</select>
	</div>
	@endforeach
	<div class="form-group">
	{!! Form::submit('Simpan',['class'=>'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}
@endsection