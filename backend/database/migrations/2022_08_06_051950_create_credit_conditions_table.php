<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_conditions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bank_id')->constrained('banks');
            $table->boolean('employment');
            $table->tinyInteger('min_age', unsigned: true);
            $table->tinyInteger('max_age', unsigned: true);
            $table->boolean('citizenship');
            $table->float('interest_rate', unsigned: true);
            $table->bigInteger('min_amount', unsigned: true);
            $table->bigInteger('max_amount', unsigned: true);
            $table->integer('min_credit_period_in_months', unsigned: true);
            $table->integer('max_credit_period_in_months', unsigned: true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credit_conditions');
    }
}
