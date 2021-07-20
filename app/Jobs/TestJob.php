<?php

namespace App\Jobs;

use App\Jobs\Middleware\RateLimited;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class TestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels,Batchable;

    protected $name;

    protected  $timeout=60;

    public $tries = 1;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        echo $this->name."\n";

    }

    //基于时间的尝试
    public function retryUntil(): Carbon
    {
        return now()->addSeconds(10);
    }

    //计算在重试任务之前需等待的秒数
    public function backoff(): int
    {
        return 5;
        //return [1, 3, 7];
    }


    //任务中间件
    public function middleware(): array
    {
        return [new RateLimited];
    }


    public function failed(\Exception $exception):void
    {
        Log::channel("queues")->error($exception->getMessage());
    }


}
