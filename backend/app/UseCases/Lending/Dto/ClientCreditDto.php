<?php

declare(strict_types=1);

namespace App\UseCases\Lending\Dto;

use App\Dto\AbstractDto;

class ClientCreditDto extends AbstractDto
{
    protected int $age;
    protected bool $employment;
    protected int $amount;
    protected int $period;
    protected bool $citizen;

    public function getAge(): int
    {
        return $this->age;
    }

    public function getEmployment(): bool
    {
        return $this->employment;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getPeriod(): int
    {
        return $this->period;
    }

    public function getCitizen(): bool
    {
        return $this->citizen;
    }
}
