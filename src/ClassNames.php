<?php

namespace ClassNames;

class ClassNames
{
    const GLUE = ' ';

    public function render(...$classes): string
    {
        $classes = array_map($this->mapCallback(), $classes);
        $classes = $this->flatten($classes);
        $classes = array_filter($classes);
        $classes = array_unique($classes);

        return implode(self::GLUE, $classes);
    }

    private function mapCallback(): callable
    {
        return function ($class) {
            return is_array($class) ? array_keys(array_filter($class)) : (string)$class;
        };
    }

    private function flatten(array $collection): array
    {
        $flat = [];

        foreach ($collection as $item) {
            if (is_array($item)) {
                $flat = array_merge($flat, $this->flatten($item));
            } else {
                $flat[] = $item;
            }
        }

        return $flat;
    }
}
