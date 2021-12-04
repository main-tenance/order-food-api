<?php

namespace App\Http\Resources\Orders;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderLinesResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'count' => $this->count(),
            'items' => $this->collection->map(fn($item) => new OrderLineResource($item)),
        ];
    }
}
