<?php

namespace App\Jobs\Middleware;


use Illuminate\Support\Facades\Redis;

class RateLimited
{
    public function handle($job, $next)
    {
        Redis::throttle('queue_job')
//            ->block(0)->allow(1)->every(5)
          ->allow(1)->every(1)
//        Redis::funnel('key')->limit(1)
            ->then(function () use ($job, $next) {
                // 获取锁 ...
                $next($job);
            }, function () use ($job) {
                // 无法获取锁 ...
                $job->release(1);
            });
    }

}
