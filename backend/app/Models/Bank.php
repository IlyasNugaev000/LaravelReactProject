<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    const COL_ID = 'id';
    const COL_NAME = 'name';
    const COL_CREATED_AT = 'created_at';
    const COL_UPDATED_AT = 'updated_at';
}
