<?php

namespace App\Services\Orders\Repositories;

use App\Models\OrderLine;

class OrderLineRepository
{

    public function create(array $data): OrderLine
    {
        $line = OrderLine::create($data);

        return OrderLine::find($line->id);
    }

}
