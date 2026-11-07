# Focus ring

The focus ring component shows an outline on the focused component.

## Usage

Focus rings are created using the `create()` method.

```php
<?php FocusRing::create(); ?>
```

## Accessibility

### Hiding from assistive technologies

Focus rings are hidden from assistive technologies using the
`aria-hidden="true"` attribute.

## API

### `create()`

| Name           | Type             | Default              | Description                                 |
| -------------- | ---------------- | -------------------- | ------------------------------------------- |
| `childName`    | `string \| null` | `null`               | The name to be used as a child component.   |
| `semanticName` | `string`         | `'uwuzu-focus-ring'` | Defines the semantic name of the component. |
