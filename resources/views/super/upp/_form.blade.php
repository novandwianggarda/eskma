<h2>{{$submit}} UPP</h2>
<div class="form-group">
	{!! Form::label('username', 'User Name') !!}
	{!! Form::text('username', $user->username, ['class'=>'form-control','id'=>'username']) !!}
	{!! Form::label('nama', 'Nama') !!}
	{!! Form::text('nama', null, ['class'=>'form-control','id'=>'nama']) !!}
	{!! Form::label('email', 'Email') !!}
	{!! Form::text('email', $user->email, ['class'=>'form-control','id'=>'email']) !!}
	{!! Form::label('password', 'Password') !!}
	{!! Form::text('password', $user->password, ['class'=>'form-control','id'=>'password']) !!}
</div>
<div class="form-group">
	{!! Form::submit('Simpan',['class'=>'btn btn-primary']) !!}
</div>