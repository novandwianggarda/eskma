@extends('layouts.master.main2')
@section('content')
<form>
	@foreach($kuesioner as $k)
	<div class="form-group">
		<label for="kues[]">{{$k->pertanyaan}}</label>
		<select name="kues[]" class="form-control">
			<option>A</option>
			<option>B</option>
			<option>C</option>
		</select>
	</div>
	@endforeach
</form>
@endsection