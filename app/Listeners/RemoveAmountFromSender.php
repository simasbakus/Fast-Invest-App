<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\NewTransactionCreatedEvent;

class RemoveAmountFromSender
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
      $newBalance = auth()->user()->balance - $event->transaction->amount;
      auth()->user()->update(['balance' => $newBalance]);
    }
}
