<?php

namespace App\Services\CreditCalculationService;

use App\Dto\DtoFactory;
use App\Models\CreditCondition;
use App\Repositories\Interfaces\CreditConditionRepositoryInterface;
use App\Services\CreditCalculationService\Dto\CreditCalculationResultDto;
use App\UseCases\Lending\Dto\ClientCreditDto;
use JetBrains\PhpStorm\Pure;

class CreditCalculationService
{
    public function __construct(
        private CreditConditionRepositoryInterface $conditionRepository,
        private DtoFactory $dtoFactory
    ) {
    }

    public function calculate(ClientCreditDto $clientCreditDto): array
    {
        $resultDtoArray = [];

        $banksWithInterestRatesCollection = $this->conditionRepository->getAvailableBanksAndInterestRates($clientCreditDto);

        foreach ($banksWithInterestRatesCollection as $bankWithInterestRate)
        {
            $bankName = $bankWithInterestRate->bank_name;
            $interestRateAsPercentage = $bankWithInterestRate->{CreditCondition::COL_INTEREST_RATE};

            $monthlyPayments = $this->calculateMonthlyPayments(
                $clientCreditDto->getAmount(),
                $interestRateAsPercentage / 1200,
                $clientCreditDto->getPeriod()
            );

            $overpaymentAmount = $this->calculateOverpaymentAmount(
                $clientCreditDto->getAmount(),
                $monthlyPayments * $clientCreditDto->getPeriod()
            );

            $resultDtoArray[] = $this->dtoFactory->createDto(CreditCalculationResultDto::class, [
                'bank_name' => $bankName,
                'interest_rate' => $interestRateAsPercentage,
                'monthly_payments' => round($monthlyPayments, 2),
                'overpayment_amount' => round($overpaymentAmount, 2)
            ]);
        }

        return $resultDtoArray;
    }

    #[Pure]
    private function calculateMonthlyPayments(int $initialCredit, float $interestRatePerMonth, int $paymentCount): float
    {
        $annuityRatio = $this->calculateAnnuityRatio($interestRatePerMonth, $paymentCount);
        $monthlyPayments = $initialCredit * $annuityRatio;

        return $monthlyPayments;
    }

    #[Pure]
    private function calculateAnnuityRatio(float $interestRatePerMonth, int $paymentCount): float
    {
        $tempRatio = (1 + $interestRatePerMonth) ** $paymentCount;
        $annuityRatio = ($interestRatePerMonth * $tempRatio) / ($tempRatio - 1);

        return $annuityRatio;
    }

    #[Pure]
    private function calculateOverpaymentAmount(int $initialCredit, float $fullPayments): float
    {
        $overpaymentAmount = $fullPayments - $initialCredit;

        return $overpaymentAmount;
    }
}
