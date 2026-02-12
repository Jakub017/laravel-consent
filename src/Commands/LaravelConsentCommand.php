<?php

namespace Jakub017\LaravelConsent\Commands;

use Illuminate\Console\Command;

class LaravelConsentCommand extends Command
{
    public $signature = 'laravel-consent';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
