<?php

namespace App\Providers;

use App\Interfaces\LessonInterface;
use App\Interfaces\QuizesInterface;
use App\Repository\lessonRepository;
use App\Repository\QuizRepository;
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
        $this->app->bind(QuizesInterface::class,QuizRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        app('router')->aliasMiddleware('auth.jwt', JWTMiddleware::class);
    }
}
