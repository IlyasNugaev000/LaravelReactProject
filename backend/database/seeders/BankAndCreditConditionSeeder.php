<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Models\CreditCondition;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankAndCreditConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $AlfaBankId = DB::table('banks')->insertGetId([
            Bank::COL_NAME => 'Альфа банк',
            Bank::COL_CREATED_AT => now(),
            Bank::COL_UPDATED_AT => now(),
        ]);

        DB::table('credit_conditions')->insert([
            CreditCondition::COL_BANK_ID => $AlfaBankId,
            CreditCondition::COL_EMPLOYMENT => true,
            CreditCondition::COL_MIN_AGE => 25,
            CreditCondition::COL_MAX_AGE => 45,
            CreditCondition::COL_CITIZENSHIP => true,
            CreditCondition::COL_INTEREST_RATE => 9,
            CreditCondition::COL_MIN_AMOUNT => 300000,
            CreditCondition::COL_MAX_AMOUNT => 1000000,
            CreditCondition::COL_MIN_CREDIT_PERIOD_IN_MONTHS => 60,
            CreditCondition::COL_MAX_CREDIT_PERIOD_IN_MONTHS => 96,
            CreditCondition::COL_CREATED_AT => now(),
            CreditCondition::COL_UPDATED_AT => now()
        ]);

        $TinkoffBankId = DB::table('banks')->insertGetId([
            Bank::COL_NAME => 'Тинькофф банк',
            Bank::COL_CREATED_AT => now(),
            Bank::COL_UPDATED_AT => now(),
        ]);

        DB::table('credit_conditions')->insert([
            CreditCondition::COL_BANK_ID => $TinkoffBankId,
            CreditCondition::COL_EMPLOYMENT => false,
            CreditCondition::COL_MIN_AGE => 20,
            CreditCondition::COL_MAX_AGE => 45,
            CreditCondition::COL_CITIZENSHIP => true,
            CreditCondition::COL_INTEREST_RATE => 5,
            CreditCondition::COL_MIN_AMOUNT => 100000,
            CreditCondition::COL_MAX_AMOUNT => 600000,
            CreditCondition::COL_MIN_CREDIT_PERIOD_IN_MONTHS => 6,
            CreditCondition::COL_MAX_CREDIT_PERIOD_IN_MONTHS => 36,
            CreditCondition::COL_CREATED_AT => now(),
            CreditCondition::COL_UPDATED_AT => now()
        ]);

        $SberBankId = DB::table('banks')->insertGetId([
            Bank::COL_NAME => 'Сбербанк',
            Bank::COL_CREATED_AT => now(),
            Bank::COL_UPDATED_AT => now(),
        ]);

        DB::table('credit_conditions')->insert([
            CreditCondition::COL_BANK_ID => $SberBankId,
            CreditCondition::COL_EMPLOYMENT => true,
            CreditCondition::COL_MIN_AGE => 18,
            CreditCondition::COL_MAX_AGE => 65,
            CreditCondition::COL_CITIZENSHIP => true,
            CreditCondition::COL_INTEREST_RATE => 8.2,
            CreditCondition::COL_MIN_AMOUNT => 300000,
            CreditCondition::COL_MAX_AMOUNT => 1000000,
            CreditCondition::COL_MIN_CREDIT_PERIOD_IN_MONTHS => 36,
            CreditCondition::COL_MAX_CREDIT_PERIOD_IN_MONTHS => 60,
            CreditCondition::COL_CREATED_AT => now(),
            CreditCondition::COL_UPDATED_AT => now()
        ]);

        $CreditEuropeBankId = DB::table('banks')->insertGetId([
            Bank::COL_NAME => 'Кредит Европа банк',
            Bank::COL_CREATED_AT => now(),
            Bank::COL_UPDATED_AT => now(),
        ]);

        DB::table('credit_conditions')->insert([
            CreditCondition::COL_BANK_ID => $CreditEuropeBankId,
            CreditCondition::COL_EMPLOYMENT => true,
            CreditCondition::COL_MIN_AGE => 30,
            CreditCondition::COL_MAX_AGE => 50,
            CreditCondition::COL_CITIZENSHIP => true,
            CreditCondition::COL_INTEREST_RATE => 11,
            CreditCondition::COL_MIN_AMOUNT => 800000,
            CreditCondition::COL_MAX_AMOUNT => 1500000,
            CreditCondition::COL_MIN_CREDIT_PERIOD_IN_MONTHS => 60,
            CreditCondition::COL_MAX_CREDIT_PERIOD_IN_MONTHS => 120,
            CreditCondition::COL_CREATED_AT => now(),
            CreditCondition::COL_UPDATED_AT => now()
        ]);
    }
}
