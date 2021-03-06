<?php
/**
 * Created by PhpStorm.
 * User: egbrites
 * Date: 16/03/17
 * Time: 01:10
 */
?>
@extends('app')

@section('content')
    <div class="container">
        <h3>Meus pedido</h3>

        @include('errors._check')


        <div class="container">

            <a href="{{route('customer.order.create')}}" class="btn btn-default">Criar pedido</a>
            <br><br>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->total}}</td>
                        <td>{{$status_list[$order->status]}}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>


    </div>

@endsection
