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
        <h1>Pedidos</h1>

        <br><br>

        {{--<div class="glyphicon-search">--}}
            {{--{!! Form::model('',['route'=>['admin.orders.index'],'class'=>'form']) !!}--}}

            {{--@include('admin.orders._formSearch')--}}

            {{--<div class="form-group">--}}
                {{--{!! Form::submit('consultar',['class'=>'btn btn-primary']) !!}--}}
            {{--</div>--}}

            {{--{!! Form::close() !!}--}}
        {{--</div>--}}

        <br><br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Total</th>
                <th>Data</th>
                <th>Itens</th>
                <th>Intregador</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->total }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        <ul>
                            @foreach($order->items as $item)
                                <li>{{$item->product->name}} - {{$item->product->price}}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        @if($order->deliveryman)
                            {{ $order->deliveryman->name }}
                        @else
                            --
                        @endif
                    </td>
                    <td>{{ $list_status[$order->status] }}</td>
                    <td>
                        <a href="{{ route('admin.orders.edit', ['id'=>$order->id]) }}" class="btn btn-default btn-sm">Editar</a>
                        <a href="" class="btn btn-default btn-sm">Excluir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $orders->render() !!}
    </div>
@endsection