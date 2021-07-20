<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class Scope extends GeneratorCommand
{

    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'make:scope {name} {--force=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Scope class';

    protected $type = 'Scope';


    protected function getStub(): string
    {
        return __DIR__.'/stubs/scope.stub';
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'\Scopes';
    }


}
