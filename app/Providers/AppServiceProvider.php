<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // ✅ tambahkan ini
use App\Models\Brand; // ✅ tambahkan ini
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
{
    // Cek apakah tabel ada sebelum menjalankan query
    if (Schema::hasTable('brands')) {
        View::composer('layouts.app', function ($view) {
            $view->with('brands', Brand::all());
        });
    }
}
}