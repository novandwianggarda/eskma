<h2>{{$submit}} Kabupaten</h2>
<div class="form-group">
	{!! Form::label('pertanyaan', 'Pertanyaan') !!}
	{!! Form::text('pertanyaan', $kuesioner->pertanyaan, ['class'=>'form-control','id'=>'pertanyaan']) !!}
</div>
<div class="form-group">
	{!! Form::submit('Simpan',['class'=>'btn btn-primary']) !!}
</div>