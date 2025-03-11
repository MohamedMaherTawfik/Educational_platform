<?php

namespace App\Providers;

use App\Interfaces\LessonInterface;
use App\Repository\lessonRepository;
use Illuminate\Support\ServiceProvider;
use Tymon\JWTAuth\Http\Middleware\Authenticate as JWTMiddleware;
use App\Interfaces\CoursesInterface;
use App\Repository\CourseRepository;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CoursesInterface::class,CourseRepository::class);
        $this->app->bind(LessonInterface::class,lessonRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        app('router')->aliasMiddleware('auth.jwt', JWTMiddleware::class);
    }
}
