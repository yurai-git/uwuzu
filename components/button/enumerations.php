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
  case Ghost = 'ghost';
  case Outlined = 'outlined';
  case Tonal = 'tonal';
}
