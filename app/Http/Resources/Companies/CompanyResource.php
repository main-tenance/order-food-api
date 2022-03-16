<?php

namespace App\Http\Resources\Companies;

use App\Http\Resources\Orders\OrderLinesResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'orders' => $this->orders->map(fn($item) => [
                'id' => $item->id,
                'sum' => $item->sum,
                'client_name' => $item->client_name,
                'lines' => new OrderLinesResource($item->lines),
                ]),
            'categories' => $this->categories->map(fn($item) => $item->only(['id', 'name'])),
            'dishes' => $this->dishes->map(fn($item) => $item->only(['id', 'name', 'price'])),
        ];
    }
}
