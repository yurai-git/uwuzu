<?php

function is_enumerated_boolean_attribute(string $argument): bool
{
    if (str_starts_with($argument, 'aria-')) {
        return true;
    }

    static $enumeratedBooleanAttributes = [
        'contenteditable',
        'draggable',
        'spellcheck',
    ];

    return in_array($argument, $enumeratedBooleanAttributes, true);
}
