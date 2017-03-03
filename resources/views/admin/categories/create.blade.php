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
        <h1>Nova Categoria</h1>

        @include('errors._check')

        {!! Form::open(['route'=>'admin.categories.store','class'=>'form']) !!}

        @include('admin.categories._form')

        <div class="form-group">
            {!! Form::submit('Criar categoria',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}


    </div>
@endsection