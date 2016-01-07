<?php

namespace Asantanacu\ShareLogin\Console\Commands;

use Illuminate\Console\Command;

class ShareLogin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sharelogin:test {--name= : Name of the generated documentation}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test command';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo $this->option('name');
    }
}
