<?php
  enum ButtonError: string {
    case Always = 'always';
    case Hover = 'hover';
    case None = 'none';
  }

  enum ButtonSize: string {
    case Large = 'large';
    case Medium = 'medium';
    case Small = 'small';
  }

  enum ButtonVariant: string {
    case Filled = 'filled';
    case Outlined = 'outlined';
    case Text = 'text';
    case Tonal = 'tonal';
  }
?>
