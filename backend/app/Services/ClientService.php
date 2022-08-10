<?php

namespace App\Services;

use App\Models\Client;
use App\Repositories\Interfaces\ClientRepositoryInterface;
use App\Repositories\Interfaces\CreditConditionRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ClientService
{
    public function __construct(
        private ClientRepositoryInterface $clientRepository
    ) {
    }

    public function register(
        string $firstName,
        string $surname,
        string $patronymic,
        string $phone,
        string $email
    ): void {
        $client = new Client();
        $client->{Client::COL_FIRSTNAME} = $firstName;
        $client->{Client::COL_SURNAME} = $surname;
        $client->{Client::COL_PATRONYMIC} = $patronymic;
        $client->{Client::COL_PHONE} = $phone;
        $client->{Client::COL_EMAIL} = $email;

        $this->clientRepository->save($client);
    }
}
