<h2>{{$submit}} UPP</h2>
<div class="form-group">
	{!! Form::label('nama', 'Nama') !!}
	{!! Form::text('nama', $user->name, ['class'=>'form-control','id'=>'nama']) !!}
</div>
<div class="form-group">
	{!! Form::submit('Simpan',['class'=>'btn btn-primary']) !!}
</div>