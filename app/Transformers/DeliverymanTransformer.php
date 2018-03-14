<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;


/**
 * Class DeliverymanTransformer
 * @package namespace App\Transformers;
 */
class DeliverymanTransformer extends TransformerAbstract
{

    /**
     * Transform the \Deliveryman entity
     * @param \Deliveryman $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => (string) $model->name,
            'email'      => (string) $model->email,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
