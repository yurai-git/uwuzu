<?php

function filter_classes(array $argument): string
{
    $classes = array_filter(
        $argument,
        fn ($value) => is_string($value) && $value !== '',
    );
    $classString = implode(' ', $classes);

    return $classString;
}
