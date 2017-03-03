<?php
/**
 * Created by PhpStorm.
 * User: egbrites
 * Date: 01/03/17
 * Time: 18:43
 */

?>
@extends('app')

@section('content')
    <div class="container">
        <h1>Editar Produto: {{ $product->name }}</h1>

        @include('errors._check')

        {!! Form::model($product,['route'=>['admin.products.update',$product->id],'class'=>'form']) !!}

        @include('admin.products._form')

        <div class="form-group">
            {!! Form::submit('Salvar',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}


    </div>
@endsection