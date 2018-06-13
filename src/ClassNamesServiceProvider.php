<?php

namespace ClassNames;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ClassNamesServiceProvider extends ServiceProvider
{
    const ALIAS = 'classnames';

    public function boot(): void
    {
        $this->registerClassNames();
        $this->registerBladeDirective();
    }

    protected function registerClassNames(): void
    {
        $this->app->singleton(self::ALIAS, function (): ClassNames {
            return new ClassNames();
        });
        $this->app->alias(self::ALIAS, ClassNames::class);
    }

    protected function registerBladeDirective(): void
    {
        Blade::directive('classNames', function (string $expression): string {
            return "<?php echo ClassNames\ClassNamesFacade::render($expression); ?>";
        });
    }
}
