<?php

declare(strict_types=1);

namespace App\Providers;

use App\Events\PublishProcessor;
use App\Listeners\MessageSubscriber;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

      protected $listen = [
       PublishProcessor::class => [
        Listeners\MessageSubscriber::class,
        Listener\MessageQueueSubscriber::class,
       ],
    ];

    //   protected $listen = [
    //     \App\Events\UserRegistered::class => [
    //        \App\Listeners\SendWelcomEmail::class,
    //     ],
    // ];


    public function boot()
    {
        parent::boot();

        Event::listen(
            PublishProcessor::class,
            MessageSubscriber:class,
        );

        $this->app['events']->listen(
            PublishProcessor:class,
            MessageSubscriber:class,
        );
    }

}





// class EventServiceProvider extends ServiceProvider
// {
//     // protected $listen = [
//     //     'Evnetクラス' => [
//     //         'Eventクラスに対応したListnerクラス',
//     //     ],
//     // ];

//       protected $listen = [
//         \App\Events\UserRegistered::class => [
//            \App\Listeners\SendWelcomEmail::class,
//         ],
//     ];

// }
