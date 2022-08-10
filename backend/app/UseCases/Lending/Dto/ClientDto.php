<?php

namespace App\UseCases\Lending\Dto;

use App\Dto\AbstractDto;

class ClientDto extends AbstractDto
{
    protected string $surname;
    protected string $firstname;
    protected string $patronymic;
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


    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
