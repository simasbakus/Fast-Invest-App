<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\NewTransactionCreatedEvent;
use App\User;

class AddAmountToRecipientListener
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $user = User::where('accountNr', $event->transaction->toAccountNr)->first();
        $newBalance = $user->balance + $event->transaction->amount;
        $user->update(['balance' => $newBalance]);
    }
}
