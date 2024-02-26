<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Term extends Model
{
    use HasFactory;
    use HasSlug;

    public const TYPE_SERVICE = 'service';
    public const TYPE_KITCHEN = 'kitchen';
    public const TYPE_FEATURE = 'feature';

    public const TYPE_TAG = 'tag';
    public const TYPE_CATEGORY = 'category';
    public const TYPE_LOCATION = 'location';
    public const TYPE_PRICE = 'price';
    public const TYPE_OPENING_HOURS = 'opening_hours';
    public const TYPE_PAYMENT_METHOD = 'payment_method';
    public const TYPE_DELIVERY_METHOD = 'delivery_method';
    public const TYPE_DELIVERY_ZONE = 'delivery_zone';
    public const TYPE_DELIVERY_FEE = 'delivery_fee';

    public const TYPES = [
        self::TYPE_SERVICE,
        self::TYPE_KITCHEN,
        self::TYPE_FEATURE,
        self::TYPE_TAG,
        self::TYPE_CATEGORY,
        self::TYPE_LOCATION,
        self::TYPE_PRICE,
        self::TYPE_OPENING_HOURS,
        self::TYPE_PAYMENT_METHOD,
        self::TYPE_DELIVERY_METHOD,
        self::TYPE_DELIVERY_ZONE,
        self::TYPE_DELIVERY_FEE,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'taxonomy',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    // shops
    public function shops()
    {
        return $this->belongsToMany(Shop::class, 'shop_terms', 'term_id', 'shop_id');
    }
}
