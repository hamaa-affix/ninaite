<?php

namespace App\Providers;

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
			$this->app->bind(
				\App\Repositories\ChatRoom\CreateChatRoomRepositoryInterface::class,
				\App\Repositories\ChatRoom\CreateChatEQRoomRepository::class,
			);
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
