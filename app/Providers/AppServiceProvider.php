<?php

namespace App\Providers;

// use App\BlowfishEncrypter;
use Illuminate\Encryption\MissingAppKeyException;
use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
 
    }

    protected function parseKey(array $config)
    {
        if (Str::startWith($key = $this->key($config), $prefix = 'base64')){
            $key = base64_decode(Str::after($key, $prefix));
        }
    }

    protected function key(array $config)
    {
        return tap(
            $config['key'],
            function ($kry) {
                if (empty($key)){
                    throw new MissingAppKeyException;
                }
            }
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}


