<?php

namespace App\Models\Data;

class Seo
{
    public const TYPE = 'seo_meta';
    public $title;
    public $description;
    public $keywords;
    public $image;
    // public $url;
    // public $type;
    // public $site_name;
    // public $locale;
    // public $twitter_card;
    // public $twitter_site;
    // public $twitter_creator;
    // public $twitter_title;
    // public $twitter_description;
    // public $twitter_image;
    // public $twitter_image_alt;
    // public $twitter_url;
    // public $twitter_type;
    // public $twitter_site_name;
    // public $twitter_locale;
    // public $og_title;
    // public $og_description;
    // public $og_image;
    // public $og_url;
    // public $og_type;
    // public $og_site_name;
    // public $og_locale;
    // public $og_video;
    // public $og_audio;
    // public $og_determiner;
    // public $og_locale_alternative;
    // public $og_article_published_time;
    // public $og_article_modified_time;
    // public $og_article_expiration_time;
    // public $og_article_author;
    // public $og_article_section;
    // public $og_article_tag;
    // public $og_book_author;
    // public $og_book_tag;
    // public $og_profile_first_name;
    // public $og_profile_last_name;
    // public $og_profile_username;
    // public $og_profile ;

    public function __construct($title, $description, $keywords, $image)
    {
        $this->title = $title;
        $this->description = $description;
        $this->keywords = $keywords;
        $this->image = $image;
    }
}
