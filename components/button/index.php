<?php
  require_once __DIR__ . '/enums.php';

  class Button {
    public function __construct(
      ?string $ariaLabel = null,
      ?bool $bypassSanitization = false,
      ?string $content = null,
      ?bool $disabled = false,
      ?string $download = null,
      ?ButtonError $error = ButtonError::None,
      ?string $href = null,
      ?string $icon = null,
      ?string $label = null,
      ?string $rel = null,
      ?ButtonSize $size = ButtonSize::Medium,
      ?bool $softDisabled = false,
      ?string $target = null,
      ?string $type = 'submit',
      ?ButtonVariant $variant = ButtonVariant::Filled,
    ) {
      $base = 'uwuzu-button';

      if ($ariaLabel !== null) { $ariaLabel = htmlspecialchars($ariaLabel); }
      $content = ($content !== null && $bypassSanitization) ? htmlspecialchars($content) : $content;
      if ($download !== null) { $download = htmlspecialchars($download); }
      $error = htmlspecialchars($error->value);
      if ($href !== null) { $href = htmlspecialchars($href); }
      if ($icon !== null) { $icon = htmlspecialchars($icon); }
      if ($label !== null) { $label = htmlspecialchars($label); }
      if ($rel !== null) { $rel = htmlspecialchars($rel); }
      $size = htmlspecialchars($size->value);
      if ($target !== null) { $target = htmlspecialchars($target); }
      $type = htmlspecialchars($type);
      $variant = htmlspecialchars($variant->value);

      $state = ($disabled || $softDisabled) ? 'disabled' : 'enabled';

      $classes = [
        "{$base}",
        "{$base}--error-{$error}",
        "{$base}--size-{$size}",
        "{$base}--state-{$state}",
        "{$base}--variant-{$variant}",
      ];
      $classString = implode(' ', $classes);

      if ($href !== null) {
        $attributes = array_filter([
          ($ariaLabel !== null) ? "aria-label='{$ariaLabel}'" : null,
          "class='{$classString}'",
          ($download !== null) ? "download='{$download}'" : null,
          "href='{$href}'",
          ($rel !== null) ? "rel='{$rel}'" : null,
          ($target !== null) ? "target='{$target}'" : null,
        ]);
        $attributeString = implode(' ', $attributes);

        echo "<a {$attributeString}>";
        $this->renderInner(
          content: $content,
          icon: $icon,
          label: $label,
          base: $base,
        );
        echo "</a>";
      } else {
        $attributes = array_filter([
          ($softDisabled) ? 'aria-disabled="true"' : null,
          ($ariaLabel !== null) ? "aria-label='{$ariaLabel}'" : null,
          "class='{$classString}'",
          ($disabled) ? 'disabled' : null,
          "type='{$type}'",
        ]);
        $attributeString = implode(' ', $attributes);

        echo "<button {$attributeString}>";
        $this->renderInner(
          content: $content,
          icon: $icon,
          label: $label,
          base: $base,
        );
        echo "</button>";
      }
    }

    private function renderInner(
      ?string $content = null,
      ?string $icon = null,
      ?string $label = null,
      string $base,
    ): void {
      if ($content !== null) {
        echo $content;
      }
      if ($icon !== null) {
        echo "<span aria-hidden='true' class='{$base}__icon'><svg><use href='{$icon}' /></svg></span>";
      }
      if ($label !== null) {
        echo "<span class='{$base}__label'>{$label}</span>";
      }

      require $_SERVER['DOCUMENT_ROOT'] . '/components/focus-ring.php';
    }
  }
?>
