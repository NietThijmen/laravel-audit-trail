<?php

namespace NietThijmen\LaravelAuditTrail\Commands;

use Illuminate\Console\Command;

class LaravelAuditTrailCommand extends Command
{
    public $signature = 'laravel-audit-trail';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
