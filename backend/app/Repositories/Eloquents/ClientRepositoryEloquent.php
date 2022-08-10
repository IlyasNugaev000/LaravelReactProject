<?php

namespace App\Repositories\Eloquents;

use App\Models\Client;
use App\Models\CreditCondition;
use App\Repositories\Interfaces\ClientRepositoryInterface;

class ClientRepositoryEloquent implements ClientRepositoryInterface
{
    public function save(Client $client): void
    {
        $client->save();
    }
}
