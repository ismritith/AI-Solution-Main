<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

$tables = ['projects', 'events', 'services', 'blogs', 'testimonials', 'registrations', 'project_reviews', 'galleries'];
foreach ($tables as $t) {
    if (Schema::hasTable($t)) {
        echo "Table: $t\n";
        print_r(Schema::getColumnListing($t));
        echo "---------------------------\n";
    }
}
