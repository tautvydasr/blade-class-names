<?php

namespace ClassNames;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ClassNamesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerClassNames();
        $this->registerBladeDirective();
    }

    protected function registerClassNames(): void
    {
        $this->app->singleton(ClassNames::class, function (): ClassNames {
            return new ClassNames();
        });
    }

    protected function registerBladeDirective(): void
    {
        Blade::directive('classNames', function (string $expression): string {
            return "<?php echo app(ClassNames\ClassNames::class)->render($expression); ?>";
        });
    }
}
