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
    {!! Form::label('Status','Status:')  !!}
    {!! Form::select('status',  $list_status , null, ['class'=>'form-control'] )  !!}
</div>

<!-- form input -->
<div class="form-group">
    {!! Form::label('Entregador','Entregador:')  !!}
    {!! Form::select('user_deliveryman_id',  $deliveryman , null, ['class'=>'form-control'] )  !!}
</div>
