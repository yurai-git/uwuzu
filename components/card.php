<?php
  require_once __DIR__ . '/helper.php';
  $base = 'uwuzu-card';

  /**
   * @var string[]|null $class   (outlined|elevated)
   * @var string        $content
   * @var bool|null     $isRaw
   */

  add_default_class($class, ['outlined', 'elevated'], 'outlined');
  $isRaw = $isRaw ?? false;

  array_unshift($class, $base);
  $class = htmlspecialchars(implode(' ', $class));
?>
<div class="<?= $class; ?>">
  <?php if ($isRaw): ?>
    <?= $content; ?>
  <?php else: ?>
    <?= htmlspecialchars($content); ?>
  <?php endif; ?>
</div>
