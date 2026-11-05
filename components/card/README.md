# Card

The card component is a container that can be used to group related content.

## Usage

Cards are created using the `start()` and `end()` methods.

```php
<?php Card::start(); ?>
    Hello, world!
<?php Card::end(); ?>
```

Use the `bypassSanitization` parameter to bypass HTML sanitization of the inner
content. Do not pass user-generated content with this parameter enabled.

```php
<?php Card::start(
    bypassSanitization: true
); ?>
    <?php Button::create(
        label: 'Button',
    ); ?>
<?php Card::end(); ?>
```

## Accessibility

### Accessible name

If the accessible name is missing or inaccurate, add one using the `ariaLabel`
parameter.

## API

### `start()`

| Name                 | Type                       | Default                 | Description                                                        |
| -------------------- | -------------------------- | ----------------------- | ------------------------------------------------------------------ |
| `ariaLabel`          | `string \| null`           | `null`                  | Adds an accessible name. Equivalent to the `aria-label` attribute. |
| `bypassSanitization` | `boolean`                  | `false`                 | Bypasses HTML sanitization of the inner content.                   |
| `semanticName`       | `string`                   | `'uwuzu-card'`          | Defines the semantic name of the component.                        |
| `variant`            | `CardVariant ('Outlined')` | `CardVariant::Outlined` | Defines the variant of the component.                              |
