<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\{SerializesModels,InteractsWithQueue,Queueable};
use Illuminate\Foundation\Bus\Dispatchable;


class PdfGenerator implements ShouldQueue
{
    use Queueable,InteractsWithQueue,Dispatchable,SerializesModels;

    private $path = '';

    /**
     * Create a new job instance.
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * Execute the job.
     */
    public function handle(Pdf $pdf)
    {
        $pdf->generateFromHtml(
            '<h1>Laravel</h1><p>Sample PDF Output.</p>', $this->path
        );
    }
}
