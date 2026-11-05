<?php

function filter_attributes(array $argument): string
{
    $attributes = array_filter(
        $argument,
        fn ($value, $key) => !is_null($value) && ($value !== false || is_enumerated_boolean_attribute($key)),
        ARRAY_FILTER_USE_BOTH,
    );
    $attributeString = implode(' ', array_map(
        static function ($value, $key) {
            if (is_enumerated_boolean_attribute($key)) {
                $value = is_bool($value) ? ($value ? 'true' : 'false') : $value;

                return "{$key}='{$value}'";
            }
            if (is_bool($value)) {
                return "{$key}";
            }
            return "{$key}='{$value}'";
        },
        $attributes,
        array_keys($attributes),
    ));

    return $attributeString;
}
