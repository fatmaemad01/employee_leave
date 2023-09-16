<?php

namespace App\Providers;

use App\Events\RequestCreated;
use App\Events\RequestDeleted;
use App\Events\RequestRespons;
use App\Events\RequestResponsed;
use App\Listeners\CreateLog;
use App\Listeners\DeleteLog;
use App\Listeners\NotifyAdmin;
use App\Listeners\NotifyUser;
use GuzzleHttp\Promise\Create;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        RequestCreated::class => [
            CreateLog::class,
            NotifyAdmin::class,
        ],
        RequestDeleted::class => [
            DeleteLog::class,
        ],
        RequestRespons::class => [
            NotifyUser::class
        ],

    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
