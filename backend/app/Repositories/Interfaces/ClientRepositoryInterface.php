<?php

namespace App\Repositories\Interfaces;

use App\Models\Client;
use App\Models\CreditCondition;

interface ClientRepositoryInterface
{
    public function save(Client $client): void;
}
