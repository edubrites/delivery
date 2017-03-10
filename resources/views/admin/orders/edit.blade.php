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
        <h1>Pedido #{{$order->id}} R$ {{ $order->total }}</h1>
        <h2>Cliente: {{$order->client->user->name  }}</h2>
        <h3>Data: {{$order->created_at}}</h3>

        <p>
            <b>Entregar em:</b><br>
            {{$order->client->address}} - {{$order->client->city}} - {{$order->client->state}}
        </p>

        <br>

        @include('errors._check')
        {!! Form::model($order,['route'=>['admin.orders.update',$order->id],'class'=>'form']) !!}


        @include('admin.orders._form')

        <div class="form-group">
            {!! Form::submit('Salvar pedido',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}


    </div>
@endsection