<?php

declare(strict_types=1);

namespace App\Services\CreditCalculationService\Dto;

use App\Dto\AbstractDto;

class CreditCalculationResultDto extends AbstractDto
{
    protected string $bankName;
    protected float $interestRate;
    protected float $monthlyPayments;
    protected float $overpaymentAmount;

}
