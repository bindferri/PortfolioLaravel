<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Footer;
use App\Models\Hero;
use App\Models\Project;
use App\Models\Skill;
use App\Policies\AdminAccessPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Project::class => AdminAccessPolicy::class,
        Skill::class => AdminAccessPolicy::class,
        Hero::class => AdminAccessPolicy::class,
        Contact::class => AdminAccessPolicy::class,
        Footer::class => AdminAccessPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
