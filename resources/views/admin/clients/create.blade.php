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
        <h1>Nova Cliente</h1>

        @include('errors._check')

        {!! Form::open(['route'=>'admin.clients.store','class'=>'form']) !!}

        @include('admin.clients._form')

        <div class="form-group">
            {!! Form::submit('Criar cliente',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}


    </div>
@endsection