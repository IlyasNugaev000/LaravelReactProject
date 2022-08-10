<?php

namespace App\Http\Controllers;

use App\Http\Requests\LendingFormRequest;
use App\UseCases\Lending\Dto\LendingEntryDto;
use App\UseCases\Lending\LendingHandler;
use Illuminate\Http\Response;

class LendingController extends Controller
{
    public function lending(LendingFormRequest $request, LendingHandler $handler): Response
    {
        $entryDto = $this->dtoFactory->createDto(LendingEntryDto::class, $request->all());
        $resultDtoArray = $handler->handle($entryDto);

        return response()->api($resultDtoArray);
    }
}
