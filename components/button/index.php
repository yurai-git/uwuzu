<?php
require_once __DIR__ . '/enumerations.php';

class Button {
  private static array $stack = [];

  public static function create(
    mixed ...$args
  ): void {
    $args['bypassSanitization'] = false;

    self::start(...$args);
    self::end();
  }

  public static function start(
    ?string $ariaLabel = null,
    bool $bypassSanitization = false,
    bool $disabled = false,
    bool $download = false,
    ButtonError $error = ButtonError::None,
    ?string $href = null,
    ?string $icon = null,
    ?string $label = null,
    ?string $rel = null,
    string $semanticName = 'uwuzu-button',
    ButtonSize $size = ButtonSize::Medium,
    bool $softDisabled = false,
    ?string $target = null,
    string $type = 'submit',
    ButtonVariant $variant = ButtonVariant::Filled,
  ): void {
    $ariaLabel = (!is_null($ariaLabel)) ? htmlspecialchars($ariaLabel) : null;
    $error = $error->value;
    $href = (!is_null($href)) ? htmlspecialchars($href) : null;
    $icon = (!is_null($icon)) ? htmlspecialchars($icon) : null;
    $label = (!is_null($label)) ? htmlspecialchars($label) : null;
    $rel = (!is_null($rel)) ? htmlspecialchars($rel) : null;
    $semanticName = htmlspecialchars($semanticName);
    $size = $size->value;
    $target = (!is_null($target)) ? htmlspecialchars($target) : null;
    $type = htmlspecialchars($type);
    $variant = $variant->value;

    $state = ($disabled || $softDisabled) ? 'disabled' : 'enabled';

    $classes = filter_classes([
      "{$semanticName}",
      "{$semanticName}--error-{$error}",
      "{$semanticName}--size-{$size}",
      "{$semanticName}--state-{$state}",
      "{$semanticName}--variant-{$variant}",
    ]);

    $inner = self::inner(
      icon: $icon,
      label: $label,
      semanticName: $semanticName,
    );

    if (!is_null($href)) {
      $attributes = filter_attributes([
        'aria-disabled' => ($disabled || $softDisabled) ? 'true' : null,
        'aria-label' => $ariaLabel,
        'class' => $classes,
        'download' => $download,
        'href' => $href,
        'onclick' => $softDisabled ? 'return false;' : null,
        'rel' => $rel,
        'style' => ($disabled || $softDisabled) ? 'pointer-events: none;' : null,
        'tabindex' => $disabled ? '-1' : null,
        'target' => $target,
      ]);
      $element = 'a';
    } else {
      $attributes = filter_attributes([
        'aria-disabled' => $softDisabled,
        'aria-label' => $ariaLabel,
        'class' => $classes,
        'disabled' => $disabled,
        'onclick' => $softDisabled ? 'return false;' : null,
        'type' => $type,
      ]);
      $element = 'button';
    }

    $result = (object)[
      'attributes' => $attributes,
      'bypassSanitization' => $bypassSanitization,
      'element' => $element,
      'inner' => $inner,
      'semanticName' => $semanticName,
    ];
    self::$stack[] = $result;

    ob_start();
  }

  public static function end(): void {
    $stack = array_pop(self::$stack);
    $innerContent = ($stack->bypassSanitization) ? ob_get_clean() : htmlspecialchars(ob_get_clean());

    ob_start();
    FocusRing::create(
      childName: "{$stack->semanticName}__focus-ring",
    );
    $focusRing = ob_get_clean();

    $result = <<<EOT
    <{$stack->element} {$stack->attributes}>
      <div class="{$stack->semanticName}__container">
        {$innerContent}
        {$stack->inner}
        {$focusRing}
      </div>
    </{$stack->element}>
    EOT;

    echo $result;
  }

  private static function inner(?string $icon, ?string $label, string $semanticName): string {
    $inner = array_filter([
      !is_null($icon) ? "<span aria-hidden='true' class='{$semanticName}__icon'><svg><use href='{$icon}' /></svg></span>" : null,
      !is_null($label) ? "<span class='{$semanticName}__label'>{$label}</span>" : null,
    ]);

    return implode('', $inner);
  }
}
