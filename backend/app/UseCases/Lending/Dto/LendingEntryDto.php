<?php

namespace App\UseCases\Lending\Dto;

use App\Dto\AbstractDto;

class LendingEntryDto extends AbstractDto
{
    protected string $surname;
    protected string $firstname;
    protected string $patronymic;
    protected string $birthday;
    protected bool $employment;
    protected int $amount;
    protected int $period;
    protected bool $citizen;
    protected string $phone;
    protected string $email;

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getPatronymic(): string
    {
        return $this->patronymic;
    }

    public function getBirthday(): string
    {
        return $this->birthday;
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

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
