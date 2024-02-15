<?php

namespace App\Models;

use Illuminate\Support\Facades\Log;

/**
 * Class Menu
 */

class Menu extends Shop
{

    public const TYPE = 'menu';
    //    constructor
    public function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    public function getItems(): array
    {
        if (empty($this->description)) {
            return [];
        }
        $menuItems = unserialize($this->description);

        return $menuItems;
    }

    public function deleteItem($uuid)
    {
        Log::info('deleteItem uuid : ' . $uuid);

        $menuItems = $this->getItems();

        foreach ($menuItems as $key => $menuItem) {
            if ($menuItem->uuid == $uuid) {
                unset($menuItems[$key]);
                break;
            }
        }
        $this->description = serialize($menuItems);
        $this->save();
    }

    public function updateItem($uuid, $data)
    {
        $menuItems = $this->getItems();
        foreach ($menuItems as $key => $menuItem) {
            if ($menuItem->uuid == $uuid) {
                $menuItems[$key] = new MenuItem(
                    $uuid,
                    $data['title'],
                    $data['price'],
                    $data['description'],
                    $data['thumbnail'] ?? null,
                    $data['position'] ?? 0

                );
                break;
            }
        }

        usort($menuItems, function ($a, $b) {
            return $a->position <=> $b->position;
        });

        $this->description = serialize($menuItems);

        $this->save();
    }

    public function addItem($data)
    {
        $menuItems = $this->getItems();
        $data['uuid'] = (string) \Illuminate\Support\Str::uuid();
        $menuItems[] = new MenuItem(
            $data['uuid'],
            $data['title'],
            $data['price'],
            $data['description'],
            $data['thumbnail'] ?? null
        );
        usort($menuItems, function ($a, $b) {
            return $a->position <=> $b->position;
        });
        $this->description = serialize($menuItems);
        $this->save();
    }
}
