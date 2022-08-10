<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    const COL_ID = 'id';
    const COL_FIRSTNAME = 'firstname';
    const COL_SURNAME = 'surname';
    const COL_PATRONYMIC = 'patronymic';
    const COL_PHONE = 'phone';
    const COL_EMAIL = 'email';
}
