<?php

namespace Botble\Vendor\Http\Resources;

use Botble\Vendor\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Transaction
 */
class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'amount'      => $this->amount,
            'description' => $this->getDescription(),
        ];
    }
}
