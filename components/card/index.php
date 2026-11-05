<?php

require_once __DIR__ . '/enumerations.php';

class Card
{
    private static array $stack = [];

    public static function start(
        ?string $ariaLabel = null,
        bool $bypassSanitization = false,
        string $semanticName = 'uwuzu-card',
        CardVariant $variant = CardVariant::Outlined,
    ): void {
        $ariaLabel = (!is_null($ariaLabel)) ? htmlspecialchars($ariaLabel) : null;
        $semanticName = htmlspecialchars($semanticName);
        $variant = $variant->value;

        $classes = filter_classes([
            "{$semanticName}",
            "{$semanticName}--variant-{$variant}",
        ]);

        $attributes = filter_attributes([
            'aria-label' => $ariaLabel,
            'class' => $classes,
        ]);
        $element = 'div';

        $result = (object)[
            'attributes' => $attributes,
            'bypassSanitization' => $bypassSanitization,
            'element' => $element,
            'semanticName' => $semanticName,
        ];
        self::$stack[] = $result;

        ob_start();
    }

    public static function end(): void
    {
        $stack = array_pop(self::$stack);
        $innerContent = ($stack->bypassSanitization) ? ob_get_clean() : htmlspecialchars(ob_get_clean());

        $result = <<<EOT
        <{$stack->element} {$stack->attributes}>
            {$innerContent}
        </{$stack->element}>
        EOT;

        echo $result;
    }
}
