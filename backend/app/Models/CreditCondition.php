<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditCondition extends Model
{
    use HasFactory;

    const COL_ID = 'id';
    const COL_BANK_ID = 'bank_id';
    const COL_EMPLOYMENT = 'employment';
    const COL_MIN_AGE = 'min_age';
    const COL_MAX_AGE = 'max_age';
    const COL_CITIZENSHIP = 'citizenship';
    const COL_INTEREST_RATE = 'interest_rate';
    const COL_MIN_AMOUNT = 'min_amount';
    const COL_MAX_AMOUNT = 'max_amount';
    const COL_MIN_CREDIT_PERIOD_IN_MONTHS = 'min_credit_period_in_months';
    const COL_MAX_CREDIT_PERIOD_IN_MONTHS = 'max_credit_period_in_months';
    const COL_CREATED_AT = 'created_at';
    const COL_UPDATED_AT = 'updated_at';
}
