<?php

namespace App\Repositories\Eloquents;

use App\Models\Bank;
use App\Models\CreditCondition;
use App\Repositories\Interfaces\CreditConditionRepositoryInterface;
use App\UseCases\Lending\Dto\ClientCreditDto;

class CreditConditionRepositoryEloquent implements CreditConditionRepositoryInterface
{
    public function __construct(private CreditCondition $entity) { }

    public function getAvailableBanksAndInterestRates(ClientCreditDto $clientCreditDto): iterable
    {
        return $this->entity->select(
            'interest_rate',
            'banks.name as bank_name'
        )
            ->where(CreditCondition::COL_MIN_AGE, '<=', $clientCreditDto->getAge())
            ->where(CreditCondition::COL_MAX_AGE, '>=', $clientCreditDto->getAge())
            ->when(!$clientCreditDto->getEmployment(), function ($query) {
                return $query->where(CreditCondition::COL_EMPLOYMENT, false);
            })
            ->when(!$clientCreditDto->getCitizen(), function ($query) {
                return $query->where(CreditCondition::COL_CITIZENSHIP, false);
            })
            ->where(CreditCondition::COL_MIN_CREDIT_PERIOD_IN_MONTHS, '<=', $clientCreditDto->getPeriod())
            ->where(CreditCondition::COL_MAX_CREDIT_PERIOD_IN_MONTHS, '>=', $clientCreditDto->getPeriod())
            ->where(CreditCondition::COL_MIN_AMOUNT, '<=', $clientCreditDto->getAmount())
            ->where(CreditCondition::COL_MAX_AMOUNT, '>=', $clientCreditDto->getAmount())
            ->join('banks', 'credit_conditions.bank_id', '=', 'banks.id')
            ->get();
    }
}
