<?php

namespace App\Console\Commands;

use App\Jobs\Middleware\RateLimited;
use App\Models\User;
use Illuminate\Bus\Batch;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Bus;
use Throwable;

class TestJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'job中间件测试';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        User::all()->map(function($user){
            \App\Jobs\TestJob::dispatch($user->name)->onQueue("test");
            //dispatch(new \App\Jobs\TestJob($user->name))->through([new RateLimited]);
        });

        return 0;
    }
}
