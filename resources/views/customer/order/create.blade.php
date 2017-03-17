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
        <h3>Novo pedido</h3>

        @include('errors._check')


        <div class="container">

            {!! Form::open(['route'=>'customer.order.store','class'=>'form']) !!}
{{--            {!! Form::open(['class'=>'form']) !!}--}}

            <div class="form-group">
                <label>Total: </label>
                <p id="total"></p>
                <a href="#" id="btnNewItem" class="btn btn-default">Novo Item</a>
                <br>
                <br>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <select class="form-control" name="items[0][product_id]">
                                @foreach($products as $p)
                                    <option value="{{ $p->id }}" data-price="{{$p->price}}">{{ $p->name }} --- {{ $p->price }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            {!!  Form::text('items[0][qtd]', 1, ['class'=>'form-control'])  !!}
                        </td>
                        <td>
                            <a href="#" id="btnDelItem" name="items[0][exc]" class="btn btn-default">Excluir Item</a>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>

            <div class="form-group">
                {!! Form::submit('Criar pedido', ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>


    </div>

@endsection

@section('post-script')
    <script>
        $('#btnNewItem').click(function () {
            var row = $('table tbody > tr:last'),
                    newRow = row.clone(),
                    lenght = $('table tbody tr').length;

            newRow.find('td').each(function () {

                var td = $(this),
                        input = td.find('input,select,a'),
                        name = input.attr('name');

                input.attr('name', name.replace((lenght - 1 ) + "", lenght + ""));

            });

            newRow.find('input').val(1);
            newRow.insertAfter(row);
            calculateTotal();
        });

        $(document.body).on("click", '#btnDelItem', function () {
            var trLen = $('table tbody tr').length;
            if (trLen > 1) {
                var par = $(this).parent().parent(); //tr
                par.remove();
                calculateTotal();
            }
        });

        $(document.body).on('change', 'select', function () {
            calculateTotal();
        });

        $(document.body).on('blur', 'input', function () {
            calculateTotal()
        });

        function calculateTotal() {
            var total = 0,
                    trLen = $('table tbody tr').length,
                    tr = null, price, qtd;

            for (var i = 0; i < trLen; i++) {
                tr = $('table tbody tr').eq(i);
                price = tr.find(':selected').data('price');
                qtd = tr.find('input').val();
                total += price * qtd;

            }

            $('#total').html(total);

        }
    </script>


@endsection