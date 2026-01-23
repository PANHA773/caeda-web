<?php

namespace Database\Seeders;

use App\Models\User;
use App\Notifications\AdminNotification;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = User::where('is_admin', true)->get();

        if ($admins->isEmpty()) {
            return;
        }

        foreach ($admins as $admin) {
            $admin->notify(new AdminNotification([
                'title' => 'Welcome to CAEDA Admin',
                'message' => 'The notification system is now live. You will receive updates here.',
                'url' => route('admin.dashboard'),
                'type' => 'success',
                'icon' => 'fas fa-check-circle',
            ]));

            $admin->notify(new AdminNotification([
                'title' => 'System Maintenance',
                'message' => 'Routine system maintenance scheduled for this weekend.',
                'url' => '#',
                'type' => 'warning',
                'icon' => 'fas fa-exclamation-triangle',
            ]));

            $admin->notify(new AdminNotification([
                'title' => 'New Security Alert',
                'message' => 'Multiple failed login attempts detected from unknown IP.',
                'url' => '#',
                'type' => 'danger',
                'icon' => 'fas fa-shield-alt',
            ]));
        }
    }
}
