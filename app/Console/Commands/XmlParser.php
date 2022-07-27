<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class XmlParser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parser:xml {path?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parser xml file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $controller = app()->make('App\Http\Controllers\HomeController');
        app()->call([$controller, 'index'], ['file' => $this->argument('path')]);
    }
}