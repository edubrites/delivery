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
        <h1>Editar Categoria</h1>

        @include('errors._check')

        {!! Form::model($category,['route'=>['admin.categories.update',$category->id],'class'=>'form']) !!}

        @include('admin.categories._form')

        <div class="form-group">
            {!! Form::submit('Salvar categoria',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}


    </div>
@endsection