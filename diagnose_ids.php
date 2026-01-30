<?php
// Diagnostic script to check workshop IDs and potential overlaps
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Workshop;
use App\Models\UpcomingWorkshop;

$workshops = Workshop::all();
$upcomingWorkshops = UpcomingWorkshop::all();

echo "--- Workshops ---\n";
foreach ($workshops as $w) {
    echo "ID: {$w->id}, Title: {$w->title}, Video: {$w->video}\n";
}

echo "\n--- Upcoming Workshops ---\n";
foreach ($upcomingWorkshops as $uw) {
    echo "ID: {$uw->id}, Title: {$uw->title}, Link: {$uw->link}\n";
}

// Check if any workshop ID is 2
$w2 = Workshop::find(2);
if ($w2) {
    echo "\nWorkshop #2 found in 'workshops' table.\n";
} else {
    echo "\nWorkshop #2 NOT found in 'workshops' table!\n";
}
