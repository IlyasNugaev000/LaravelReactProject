<?php

namespace App\Dto;

use MarfaTech\Component\DtoResolver\Dto\DtoResolverInterface;

class DtoFactory
{
    public function createDto(string $dtoClass, array $data): AbstractDto|DtoResolverInterface
    {
        return new $dtoClass($data);
    }
}
