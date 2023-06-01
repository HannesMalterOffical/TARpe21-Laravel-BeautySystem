<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\NewService;
use App\Events\ServiceCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendServiceCreatedNotifications implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ServiceCreated $event): void
    {
        foreach (User::whereNot('id', $event->service->user_id)->cursor() as $user) {
            $user->notify(new NewChirp($event->service));
    }
}
