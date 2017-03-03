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
        <h1>Clientes</h1>
        <a href="{{ route('admin.clients.create') }}" class="btn btn-default">Novo cliente</a>
        <br><br>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->user->name}}</td>
                    <td><a href="{{ route('admin.clients.edit',['id'=>$client->id]) }}" class="btn btn-default btn-sm">Editar</a>
                        <a href="{{ route('admin.clients.delete',['id'=>$client->id]) }}" class="btn btn-default btn-sm">Excluir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $clients->render() !!}
    </div>
@endsection