# Button

The button component can be used as an `<a>` or a `<button>` element.

## Usage

Buttons are created using the `create()` method.

### Variants

There are four variants of the component: `Filled` (default), `Ghost`,
`Outlined`, and `Tonal`. Use the `variant` parameter to specify the variant.

```php
<?php Button::create(
  variant: ButtonVariant::Filled,
  label: 'Ueuse',
); ?>
```

### Sizes

There are three sizes of the component: `Large`, `Medium` (default), and
`Small`. Use the `size` parameter to specify the size.

```php
<?php Button::create(
  size: ButtonSize::Large,
  label: 'Sign in',
); ?>
```

### Error display styles

There are three error display styles of the component: `Always`, `Hover`, and
`None` (default). Use the `error` parameter to specify the error display style.

```php
<?php Button::create(
  error: ButtonError::Always,
  label: 'Block',
); ?>
```

### Inner content

Use the `start()` and `end()` methods to include content inside the component.

```php
<?php Button::start(
  ariaLabel: 'More options',
); ?>
  more_vert
<?php Button::end(); ?>
```

Use the `bypassSanitization` parameter to bypass HTML sanitization of the inner
content. Do not pass user-generated content with this parameter enabled.

```php
<?php Button::start(
  bypassSanitization: true,
  label: 'Open settings',
); ?>
  <?php DialogTrigger::create(
    for: 'settings-dialog',
  ); ?>
<?php Button::end(); ?>
```

## Accessibility

### Hiding from assistive technologies

Icons are hidden from assistive technologies using the `aria-hidden="true"`
attribute.

### Accessible name

If the accessible name is missing or inaccurate, add one using the `ariaLabel`
parameter.

```php
<?php Button::create(
  ariaLabel: 'Compose a new ueuse',
  icon: '/images/add.svg',
); ?>
```

### Focusable and disabled

Use the `softDisabled` parameter to make the button non-interactive, but still
focusable.

```php
<?php Button::create(
  error: ButtonError::Always,
  label: 'Delete',
  softDisabled: true,
); ?>
```

## API

### `create()`

| Name                 | Type                                                           | Default                 | Description                                                                                                                         |
| -------------------- | -------------------------------------------------------------- | ----------------------- | ----------------------------------------------------------------------------------------------------------------------------------- |
| `ariaLabel`          | `string \| null`                                               | `null`                  | Adds an accessible name. Equivalent to the `aria-label` attribute.                                                                  |
| `disabled`           | `boolean`                                                      | `false`                 | Indicates whether the user can interact with the component. Equivalent to the `disabled` attribute of the `<button>` element.       |
| `download`           | `boolean`                                                      | `false`                 | Indicates that the hyperlink is to be used for downloading a resource. Equivalent to the `download` attribute of the `<a>` element. |
| `error`              | `ButtonError ('Always' \| 'Hover' \| 'None')`                  | `ButtonError::None`     | Defines the error display style of the component.                                                                                   |
| `href`               | `string \| null`                                               | `null`                  | The URL of a linked resource. Equivalent to the `href` attribute of the `<a>` element.                                              |
| `icon`               | `string \| null`                                               | `null`                  | Defines the icon to be displayed in the component.                                                                                  |
| `label`              | `string \| null`                                               | `null`                  | Defines the text label to be displayed in the component.                                                                            |
| `rel`                | `string \| null`                                               | `null`                  | Specifies the relationship of the target object to the link object. Equivalent to the `rel` attribute of the `<a>` element.         |
| `semanticName`       | `string`                                                       | `'uwuzu-button'`        | Defines the semantic name of the component.                                                                                         |
| `size`               | `ButtonSize ('Large' \| 'Medium' \| 'Small')`                  | `ButtonSize::Medium`    | Defines the size of the component.                                                                                                  |
| `softDisabled`       | `boolean`                                                      | `false`                 | Makes the component non-interactive, but still focusable.                                                                           |
| `target`             | `string \| null`                                               | `null`                  | Specifies where to open the linked document. Equivalent to the `target` attribute of the `<a>` element.                             |
| `type`               | `string`                                                       | `'submit'`              | Defines the default behavior of the component. Equivalent to the `type` attribute of the `<button>` element.                        |
| `variant`            | `ButtonVariant ('Filled' \| 'Ghost' \| 'Outlined' \| 'Tonal')` | `ButtonVariant::Filled` | Defines the variant of the component.                                                                                               |

### `start()`

| Name                 | Type                                                           | Default                 | Description                                                                                                                         |
| -------------------- | -------------------------------------------------------------- | ----------------------- | ----------------------------------------------------------------------------------------------------------------------------------- |
| `ariaLabel`          | `string \| null`                                               | `null`                  | Adds an accessible name. Equivalent to the `aria-label` attribute.                                                                  |
| `bypassSanitization` | `boolean`                                                      | `false`                 | Bypasses HTML sanitization of the inner content.                                                                                    |
| `disabled`           | `boolean`                                                      | `false`                 | Indicates whether the user can interact with the component. Equivalent to the `disabled` attribute of the `<button>` element.       |
| `download`           | `boolean`                                                      | `false`                 | Indicates that the hyperlink is to be used for downloading a resource. Equivalent to the `download` attribute of the `<a>` element. |
| `error`              | `ButtonError ('Always' \| 'Hover' \| 'None')`                  | `ButtonError::None`     | Defines the error display style of the component.                                                                                   |
| `href`               | `string \| null`                                               | `null`                  | The URL of a linked resource. Equivalent to the `href` attribute of the `<a>` element.                                              |
| `icon`               | `string \| null`                                               | `null`                  | Defines the icon to be displayed in the component.                                                                                  |
| `label`              | `string \| null`                                               | `null`                  | Defines the text label to be displayed in the component.                                                                            |
| `rel`                | `string \| null`                                               | `null`                  | Specifies the relationship of the target object to the link object. Equivalent to the `rel` attribute of the `<a>` element.         |
| `semanticName`       | `string`                                                       | `'uwuzu-button'`        | Defines the semantic name of the component.                                                                                         |
| `size`               | `ButtonSize ('Large' \| 'Medium' \| 'Small')`                  | `ButtonSize::Medium`    | Defines the size of the component.                                                                                                  |
| `softDisabled`       | `boolean`                                                      | `false`                 | Makes the component non-interactive, but still focusable.                                                                           |
| `target`             | `string \| null`                                               | `null`                  | Specifies where to open the linked document. Equivalent to the `target` attribute of the `<a>` element.                             |
| `type`               | `string`                                                       | `'submit'`              | Defines the default behavior of the component. Equivalent to the `type` attribute of the `<button>` element.                        |
| `variant`            | `ButtonVariant ('Filled' \| 'Ghost' \| 'Outlined' \| 'Tonal')` | `ButtonVariant::Filled` | Defines the variant of the component.                                                                                               |
