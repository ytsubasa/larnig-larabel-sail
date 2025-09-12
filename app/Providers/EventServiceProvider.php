protected $listen = [
    \Illuminate\Auth\Events\Registered::class => [
        \App\Listeners\RegisteredListener::class,
    ],
];
