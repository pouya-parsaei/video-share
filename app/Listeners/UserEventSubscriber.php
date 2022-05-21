<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Events\VideoCreated;
use App\Models\Video;

class UserEventSubscriber
{
    /**
     * Handle user login events.
     */
    public function handleUserCreate($event)
    {
        dump($event->user);
    }

    /**
     * Handle user logout events.
     */
    public function handleVideoCreate($event)
    {
        dump($event->video);

    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     * @return array
     */
    public function subscribe($events)
    {
        return [
            UserCreated::class => 'handleUserCreate',
            VideoCreated::class => 'handleVideoCreate'
        ];

    }
}
