<?php

namespace App\Jobs;


use App\Jobs\Middleware\RateLimited;
use App\Mail\Newsletter;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNewsletterSubscriptionEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;

    //在超时之前任务可以运行的秒数
    public $timeout=60;

    //任务可尝试的次数
    public $tries = 1;

    //任务失败前允许的最大异常数
    public $maxExceptions = 3;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email=$email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
         Mail::to($this->email)->send(new Newsletter("12233",$this->email));
    }

    public function  fail($exception = null)
    {
        //失败处理
    }


}
