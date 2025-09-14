<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    // protected $listen = [
    //     'Evnetクラス' => [
    //         'Eventクラスに対応したListnerクラス',
    //     ],
    // ];

      protected $listen = [
        \App\Events\UserRegistered::class => [
           \App\Listeners\SendWelcomEmail::class,
        ],
    ];

}
