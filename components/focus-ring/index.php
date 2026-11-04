<?php
class FocusRing {
  public static function create(
    ?string $childName = null,
    string $semanticName = 'uwuzu-focus-ring',
  ): void {
    $classes = filter_classes([
      $childName,
      $semanticName,
    ]);

    $attributes = filter_attributes([
      'aria-hidden' => 'true',
      'class' => $classes,
    ]);

    echo "<div {$attributes}></div>";
  }
}
