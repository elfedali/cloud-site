<?php

namespace App\Models;

use App\Models\Data\Seo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Shop extends Model implements HasMedia
{
    use HasFactory;
    use HasSlug;
    use \Spatie\MediaLibrary\InteractsWithMedia;


    protected $table = 'shops';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'owner_id',
        'title',
        'slug',
        'description',
        'excerpt',
        'status',
        'type',
        'comment_status',
        'ping_status',
        'position',
        'is_active',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'owner_id' => 'integer',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function getShopMenus()
    {
        $menus = Menu::where('owner_id', $this->owner_id)
            ->where('type', 'menu')
            ->orderBy('position', 'asc')
            ->get();

        return $menus;
    }

    // metas
    public function metas()
    {
        return $this->hasMany(ShopMeta::class);
    }

    // set seo
    public function setSeo(array $data)
    {

        $seo = new Seo($data['meta_title'], $data['meta_description'], $data['meta_keywords'], $data['meta_image'] ?? null);

        $this->metas()->updateOrCreate(
            ['meta_key' => 'seo_meta'],
            ['meta_value' => serialize($seo)]
        );
    }
    public function getSeo()
    {
        $seo = $this->metas()->where('meta_key', 'seo_meta')->first();

        if ($seo) {


            return unserialize($seo->meta_value);
        }

        return new Seo(null, null, null, null);
    }
}
