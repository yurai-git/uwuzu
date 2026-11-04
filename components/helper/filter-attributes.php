<?php
function filter_attributes(array $argument): string {
  $attributes = array_filter(
    $argument,
    fn($value) => !is_null($value) && $value !== false,
  );
  $attributeString = implode(' ', array_map(
    static function($value, $key) {
      if (is_enumerated_boolean_attribute($key)) {
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
