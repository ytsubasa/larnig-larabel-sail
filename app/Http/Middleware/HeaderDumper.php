<?php

declare(strict_types=1);
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;

class HeaderDumper
{

    private $loger;

    public function __construct(LoggerInterface $loger)
    {
     $this->logger = $logger;   
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $this->logger->info(
            'request',
            [
                'header' => stval($request->headers)
            ]
            );
        return $next($request);
    }



}
