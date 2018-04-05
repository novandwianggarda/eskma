@extends('layouts.master.main')
@section('index-content')

<div class="box-body">
          <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                  <thead>
                      <tr>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Berita</th> 
                      </tr>
                  </thead>
                <tbody>
                      <tr>
                    <td>
                      <div class="form-gorup">
                        <div class="">
                          {!! Form::text('judul', null, ['class'=>'form-control']) !!}
                          {!! $errors->has('judul')?$errors->first('judul'):'' !!}
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="form-gorup">
                        <div class="">
                          {!! Form::text('kategori', null, ['class'=>'form-control']) !!}
                          {!! $errors->has('kategori')?$errors->first('kategori'):'' !!}
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="form-gorup">
                        <div class="">
                          {!! Form::text('berita', null, ['class'=>'form-control']) !!}
                          {!! $errors->has('berita')?$errors->first('berita'):'' !!}
                        </div>
                      </div>
                    </td>

                    
                  </tr>
                </tbody>
          </table>
        
      </div>
@stop