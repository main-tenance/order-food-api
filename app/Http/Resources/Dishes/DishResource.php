<?php

namespace App\Http\Resources\Dishes;

use Illuminate\Http\Resources\Json\JsonResource;

class DishResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->only([
            'id',
            'name',
            'category_id',
            'price',
            'image',
            'description',
        ]);
    }
}
