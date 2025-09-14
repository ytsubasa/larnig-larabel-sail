<?php

namespace App\Listeners;

use App\Events\PublishProcessor;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MessageQueueSubscriber implements ShouldQueue
{

    use InteractsWithQueue;
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
    public function handle(PublishProcessor $event): void
    {
        \Log::info($event->getInt());
    }
}
