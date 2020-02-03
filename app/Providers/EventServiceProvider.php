<?php

namespace App\Providers;

use App\Events\NewTransactionCreatedEvent;
use App\Listeners\RemoveAmountFromSender;
use App\Listeners\AddAmountToRecipientListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        NewTransactionCreatedEvent::class => [
            RemoveAmountFromSender::class,
            AddAmountToRecipientListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
