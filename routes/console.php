<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Artisan::command('hello:closure', function() {
    $this->comment('待たせたな！！！');
    return 0;
})->describe('サンプルですよコマンド');

Artisan::command('ok', function() {
    $this->comment('OKですよ、よくできたね！');
});