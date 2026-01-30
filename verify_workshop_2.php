<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$workshop = App\Models\Workshop::find(2);
if ($workshop) {
    echo "ID: " . $workshop->id . "\n";
    echo "Title: " . $workshop->title . "\n";
    echo "Video: " . $workshop->video . "\n";
    echo "Video URL (Accessor): " . $workshop->video_url . "\n";
    echo "Instructor: " . $workshop->instructor . "\n";
} else {
    echo "Workshop #2 not found.\n";
}
