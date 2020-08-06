<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\FarmPolicy;
use App\Policies\RecruitmentPolicy;
use Auth;
use App\User;
use App\Farm;
use App\Keyword;
use App\Recruitment;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'App\Farm' => 'App\Policies\FarmPolicy',
        Farm::class => FarmPolicy::class,
        Recruitment::class => RecruitmentPolicy::class,
        Keyword::class => KeywordPolicy::class, 
        ChatRoom::class => ChatRoomPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
         //Gate::resource('farms', 'App\Policies\FarmPolicy');
    }
}
