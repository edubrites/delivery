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
        <h1>Novo Produto</h1>

        @include('errors._check')

        {!! Form::open(['route'=>'admin.products.store','class'=>'form']) !!}

        @include('admin.products._form')

        <div class="form-group">
            {!! Form::submit('Criar produto',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}


    </div>
@endsection