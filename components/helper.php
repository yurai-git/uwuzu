<?php
  if (!function_exists('add_default_class')) {
    /**
     * @param string[] $class
     * @param string[] $candidates
     * @param string   $default
     */
    function add_default_class(array &$class, array $candidates, string $default): void {
      if (empty(array_intersect($class, $candidates))) {
        $class[] = $default;
      }
    }
  }
?>
