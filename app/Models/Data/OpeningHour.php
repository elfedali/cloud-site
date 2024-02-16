<?php

namespace App\Models\Data;

class OpeningHour
{
    public const TYPE = 'opening_hours';
    public const DAYS = [
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
        'sunday',
    ];

    public $day;
    public $open;
    public $close;

    public function __construct($day, $open, $close)
    {
        $this->day = $day;
        $this->open = $open;
        $this->close = $close;
    }
}
