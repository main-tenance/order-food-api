<?php

namespace App\Http\Resources\Companies;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CompaniesResource extends ResourceCollection
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
            'items' => $this->collection->map(fn($item) => new CompanyResource($item)),
        ];
    }
}
