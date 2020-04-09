<?php
/**
 * Author: Mohamed Elogail
 * Email: moh.elogail@gmail.com
 * Date: 16/01/2020
 * Time: 05:37 م
 */

namespace Melogail\LaravelReviews\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelReviewsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $timestamp = date('Y_m_d_His', time());
        $this->publishes([
            __DIR__ . '/../database/migrations/create_reviews_table.php' => $this->app->databasePath("/migrations/{$timestamp}_create_reviews_table.php"),
            __DIR__ . '/../config/laravel-reviews.php' => config_path('laravel-reviews.php'),
        ], 'reviews_data');
    }
}
