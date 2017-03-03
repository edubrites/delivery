<?php
/**
 * Created by PhpStorm.
 * User: egbrites
 * Date: 02/03/17
 * Time: 01:06
 */
?>

<!-- form input -->
<div class="form-group">
    {!! Form::label('Name','Nome:')  !!}
    {!! Form::text('user[name]', null, ['class'=>'form-control'] )  !!}
</div>
<!-- form input -->
<div class="form-group">
    {!! Form::label('Email','Email:')  !!}
    {!! Form::text('user[email]', null, ['class'=>'form-control'] )  !!}
</div>


<!-- form input -->
<div class="form-group">
    {!! Form::label('Phone','Telefone:')  !!}
    {!! Form::text('phone', null, ['class'=>'form-control'] )  !!}
</div>

<!-- form input -->
<div class="form-group">
    {!! Form::label('Address','Endereço:')  !!}
    {!! Form::text('address', null, ['class'=>'form-control'] )  !!}
</div>
<!-- form input -->
<div class="form-group">
    {!! Form::label('City','Cidade:')  !!}
    {!! Form::text('city', null, ['class'=>'form-control'] )  !!}
</div>
<!-- form input -->
<div class="form-group">
    {!! Form::label('State','UF:')  !!}
    {!! Form::text('state', null, ['class'=>'form-control'] )  !!}
</div>
<!-- form input -->
<div class="form-group">
    {!! Form::label('Zipcode','CEP:')  !!}
    {!! Form::text('zipcode', null, ['class'=>'form-control'] )  !!}
</div>

