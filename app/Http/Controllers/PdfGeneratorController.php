<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Jobs\PdfGenerator;
use Illuminate\Contracts\Bus\Dispatcher;

use function dispatch;

final class PdfGeneratorController extends Controller
{
    private $dispatcher;

    public function __construct(
        Dispatcher $dispatcher
    ) {
        $this->dispatcher = $dispatcher;
    }
    
    public function __invoke(): void
    {
        $generator = new PdfGenerator(storage_path('pdf/sample.pdf'));

        $this->dispatcher->dispatch($generator);
        $this->dispatch($generator);

        dispatch($generator);
    }

}