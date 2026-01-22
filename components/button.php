<?php
  require_once __DIR__ . '/helper.php';
  $base = 'uwuzu-button';

  /**
   * @var string[]|null $class ('iro' | 'filled' | 'siro' | 'tonal' | 'subtle' | 'text', 'small' | 'medium', ('elevated')?)
   * @var string|null   $label
   * @var string|null   $link
   * @var bool|null     $isExternal
   * @var string|null   $onClick
   */

  add_default_class($class, ['iro', 'filled', 'siro', 'tonal', 'subtle', 'text'], 'iro');
  add_default_class($class, ['small', 'medium'], 'small');
  $label = htmlspecialchars($label ?? 'Button');
  $link = htmlspecialchars($link ?? null);
  $isExternal = $isExternal ?? false;
  $onClick = htmlspecialchars($onClick ?? null);

  array_unshift($class, $base);
  $class = htmlspecialchars(implode(' ', $class));
?>
<?php if (!empty($link)): ?>
  <a
    href="<?= $link; ?>"
    class="<?= $class; ?>"
    <?php if ($isExternal) echo 'target="_blank" rel="noopener noreferrer"'; ?>
  >
    <div><?= $label; ?></div>
    <?php require __DIR__ . '/focus-ring.php'; ?>
  </a>
<?php else: ?>
  <button
    type="button"
    class="<?= $class; ?>"
    <?php if (!empty($onClick)) echo 'onclick="' . $onClick . '"'; ?>
  >
    <div><?= $label; ?></div>
    <?php require __DIR__ . '/focus-ring.php'; ?>
  </button>
<?php endif; ?>
