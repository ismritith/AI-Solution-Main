<?php
// Bootstrap Laravel
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Project;

try {
    $project = Project::first();
    if ($project) {
        echo "Found project: " . $project->title . "\n";
        echo "cover_image value: " . var_export($project->cover_image, true) . "\n";
        print_r($project->toArray());
    } else {
        echo "No projects in database.\n";
    }
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
