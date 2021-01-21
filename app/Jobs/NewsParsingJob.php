<?php

namespace App\Jobs;

use App\Services\NewsParser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class NewsParsingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $source;
    public function __construct($source)
    {
        $this->source = $source;
    }

    /**
     * Execute the job.
     *
     * @param NewsParser $parser
     * @return void
     */
    public function handle(NewsParser $parser)
    {
        \Storage::disk('parser_logs')
            ->append(
                'parsing.log',
                date("H:i:s"). $this->source
            );

        $message = "success";
        try {
            $parser->parse($this->source);
        } catch (\Exception $e) {
            $message = "ERROR : " . $e->getMessage();
        } finally {
            \Storage::disk('parser_logs')
                ->append('parsing.log', $message);
        }

    }
}
