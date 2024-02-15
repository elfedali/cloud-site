<?php

namespace App\Models;

/**
 * Class Menu
 */
class MenuItem
{

    public const TYPE = 'menu_item';
    public $uuid;
    public $title;
    public $price;
    public $description;
    public $thumbnail;
    public $type = self::TYPE;
    public $position = 0;

    public function __construct($uuid, $title, $price, $description, $thumbnail, $position = 0)
    {
        $this->uuid = $uuid;
        $this->title = $title;
        $this->price = $price;
        $this->description = $description;
        $this->thumbnail = $thumbnail;
        $this->position = $position;
    }
}
