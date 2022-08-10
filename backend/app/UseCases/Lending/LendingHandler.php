<?php

namespace App\UseCases\Lending;

use App\Dto\AbstractDto;
use App\Repositories\Interfaces\CreditConditionRepositoryInterface;
use App\Services\ClientService;
use App\Services\CreditCalculationService\CreditCalculationService;
use App\UseCases\Lending\Dto\ClientCreditDto;
use App\UseCases\Lending\Dto\ClientDto;
use App\UseCases\Lending\Dto\LendingEntryDto;
use DateTime;


class LendingHandler
{
    public function __construct(
        private CreditCalculationService $creditCalculationService,
        private ClientService $clientService
    ) {
    }

    public function handle(LendingEntryDto $entryDto)
    {
        $this->clientService->register(
            $entryDto->getFirstname(),
            $entryDto->getSurname(),
            $entryDto->getPatronymic(),
            $entryDto->getPhone(),
            $entryDto->getEmail()
        );

        $clientCreditDto = new ClientCreditDto([
            'age' => $this->calculateAgeByBirthday($entryDto->getBirthday()),
            'employment' => $entryDto->getEmployment(),
            'amount' => $entryDto->getAmount(),
            'period' => $entryDto->getPeriod(),
            'citizen' => $entryDto->getCitizen()
        ]);

        return $this->creditCalculationService->calculate($clientCreditDto);
    }

    private function calculateAgeByBirthday(string $birthday): int
    {
        $birthday = new DateTime($birthday);
        $interval = $birthday->diff(new DateTime);
        $age =  $interval->y;

        return $age;
    }
}
