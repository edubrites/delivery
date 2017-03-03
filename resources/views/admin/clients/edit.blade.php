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
        <h1>Editar Cliente: {{$client->user->name}}</h1>

        @include('errors._check')

        {!! Form::model($client,['route'=>['admin.clients.update',$client->id],'class'=>'form']) !!}

        @include('admin.clients._form')

        <div class="form-group">
            {!! Form::submit('Salvar',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}


    </div>
@endsection