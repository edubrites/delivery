<?php

namespace App\Transformers;

use App\Http\Controllers\OrdersController;
use League\Fractal\TransformerAbstract;
use App\Models\Order;

/**
 * Class OrderTransformer
 * @package namespace App\Transformers;
 */
class OrderTransformer extends TransformerAbstract
{

    protected $availableIncludes = ['cupom', 'items', 'client'];

    /**
     * Transform the \Order entity
     * @param \Order $model
     *
     * @return array
     */
    public function transform(Order $model)
    {
        return [
            'id' => (int)$model->id,
            'total' => (float)$model->total,
            'items' => $model->items,
            'status' => (int)$model->status,
            'status_name' => $this->getStatusOrder((int)$model->status),

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeClient(Order $model)
    {
        return $this->item($model->client, new ClientTransformer());
    }


    public function includeCupom(Order $model)
    {
        if (!$model->cupom) {
            return null;
        }
        return $this->item($model->cupom, new CupomTransformer());
    }

    public function includeItems(Order $model)
    {
        return $this->collection($model->items, new OrderItemTransformer());
    }

    public function includeDeliveryman(Order $model)
    {
        return $this->item($model->deliveryman, new DeliverymanTransformer());
    }

    public function getStatusOrder($status=false)
    {
        $list_status = [0 => 'Pendente', 1 => 'A Caminho', 2 => 'Entregue', 3 => 'Cancelado'];

        if(isset($status)){
            return $list_status[$status];
        }else{
            return $list_status;
        }
    }
}
