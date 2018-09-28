<?php

namespace App\Providers;

use App\Repositories\Dashboard\{DashboardEloquentRepository, DashboardRepositoryInterface};
use App\Repositories\Conversation\{ConversationEloquentRepository, ConversationRepositoryInterface};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Conversation
         */
        $this->app->singleton(
            ConversationRepositoryInterface::class,
            ConversationEloquentRepository::class
        );

        /**
         * Dashboard
         */
        $this->app->singleton(
            DashboardRepositoryInterface::class,
            DashboardEloquentRepository::class
        );
    }
}
