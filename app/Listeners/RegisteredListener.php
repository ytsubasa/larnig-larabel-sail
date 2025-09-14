<?php

declare(strict_types=1);

namespace App\Listeners;

use IlluminateAuthEventsRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;


class RegisteredListener
{
    private $mailer;
    private $eloquent;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        $this->mailer   = $mailer;
        $this->eloquent = $eloquent;

    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event)
    {
        $user = $this->eloquent->findOrFail($event->user->gerAuthIdentifer());
        $this->mailer->raw('会員登録完了しました', function ($massage) use ($user){
            $message->subject('会員登録メール')->to($user->email);
        });
    }

}
