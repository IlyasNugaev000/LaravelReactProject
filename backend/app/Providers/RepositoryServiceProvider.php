<?php

namespace App\Providers;

use App\Repositories\Eloquents\ClientRepositoryEloquent;
use App\Repositories\Eloquents\CreditConditionRepositoryEloquent;
use App\Repositories\Interfaces\ClientRepositoryInterface;
use App\Repositories\Interfaces\CreditConditionRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CreditConditionRepositoryInterface::class, CreditConditionRepositoryEloquent::class);
        $this->app->bind(ClientRepositoryInterface::class, ClientRepositoryEloquent::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
