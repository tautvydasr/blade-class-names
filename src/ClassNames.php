<?php

namespace ClassNames;

class ClassNames
{
    const GLUE = ' ';

    public function render(...$classes): string
    {
        $classes = collect($classes)
            ->map(function ($class) {
                return is_array($class) ? collect($class)->filter()->keys() : (string)$class;
            })
            ->flatten()
            ->filter()
            ->unique()
            ->implode(self::GLUE)
        ;

        return e($classes);
    }
}
