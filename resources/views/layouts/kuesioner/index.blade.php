@extends('layouts.master.main')
@section('index-content')

<div class="box-body">
          <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                  <thead>
                      <tr>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Subtotal</th> 
                      </tr>
                  </thead>
                <tbody>
                      <tr>
                    <td>
                      <div class="form-gorup">
                        <div class="">
                          {!! Form::text('qty_penjualan', null, ['class'=>'form-control']) !!}
                          {!! $errors->has('qty_penjualan')?$errors->first('qty_penjualan'):'' !!}
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="form-gorup">
                        <div class="">
                          {!! Form::text('harga', null, ['class'=>'form-control']) !!}
                          {!! $errors->has('harga')?$errors->first('harga'):'' !!}
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="form-gorup">
                        <div class="">
                          {!! Form::text('subtotal', null, ['class'=>'form-control']) !!}
                          {!! $errors->has('subtotal')?$errors->first('subtotal'):'' !!}
                        </div>
                      </div>
                    </td>

                    
                  </tr>
                </tbody>
          </table>
        
      </div>
@stop