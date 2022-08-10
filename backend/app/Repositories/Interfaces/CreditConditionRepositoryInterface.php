<?php

namespace App\Repositories\Interfaces;

use App\Models\CreditCondition;
use App\UseCases\Lending\Dto\ClientCreditDto;

interface CreditConditionRepositoryInterface
{
    public function getAvailableBanksAndInterestRates(ClientCreditDto $clientCreditDto): iterable;
}
