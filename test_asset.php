<?php
// Bootstrap Laravel
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "asset('https://google.com'): " . asset('https://google.com') . "\n";
echo "asset('/storage/img.png'): " . asset('/storage/img.png') . "\n";
