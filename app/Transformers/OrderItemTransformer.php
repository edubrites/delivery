<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\OrderItem;

/**
 * Class OrderItemTransformer
 * @package namespace App\Transformers;
 */
class OrderItemTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['product'];

    /**
     * Transform the \OrderItem entity
     * @param \OrderItem $model
     *
     * @return array
     */
    public function transform(OrderItem $model)
    {
        return [
            'id' => (int)$model->id,
            'product_id' => (int)$model->product_id,
            'price' => (float)$model->price,
            'qtd' => (float)$model->qtd,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeProduct(OrderItem $model)
    {
        return $this->item($model->product, new ProductTransformer());
    }
}
