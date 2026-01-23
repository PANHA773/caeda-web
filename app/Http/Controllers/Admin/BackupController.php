<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class BackupController extends Controller
{
    public function index()
    {
        return view('admin.backup.index');
    }

    public function create()
    {
        $database = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $host = env('DB_HOST', '127.0.0.1');

        $filename = "backup-" . date('Y-m-d-H-i-s') . ".sql";
        $path = storage_path('app/' . $filename);

        // Path to mysqldump in XAMPP
        $mysqldumpPath = 'C:\\xampp\\mysql\\bin\\mysqldump.exe';

        $command = sprintf(
            '"%s" --user=%s %s --host=%s %s > "%s"',
            $mysqldumpPath,
            $username,
            $password ? "--password=" . $password : "",
            $host,
            $database,
            $path
        );

        // Using exec since Symfony Process might have issues with redirection in Windows shells
        exec($command, $output, $returnVar);

        if ($returnVar !== 0) {
            return back()->with('error', 'Backup failed. Make sure mysqldump is accessible.');
        }

        if (!file_exists($path)) {
            return back()->with('error', 'Backup file was not created.');
        }

        return Response::download($path)->deleteFileAfterSend(true);
    }
}
