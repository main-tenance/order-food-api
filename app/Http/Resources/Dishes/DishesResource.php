<?php

namespace App\Http\Resources\Dishes;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DishesResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'count' => $this->count(),
            'items' => $this->collection->map(fn($item) => new DishResource($item)),
        ];
    }
}
