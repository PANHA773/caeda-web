<?php

// app/Providers/ViewServiceProvider.php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\SocialLink;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $view->with(
                'socialLinks',
                SocialLink::where('is_active', true)->get()
            );
        });
    }
}

