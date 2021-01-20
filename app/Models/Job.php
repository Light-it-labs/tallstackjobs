<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Job extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    use hasSlug;

    protected $fillable = [
        'name', 'description', 'currency', 'salary', 'email', 'apply_link', 'company_id'
    ];

    //Get the options for generating the slug.
    public function getSlugOptions() : SlugOptions {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    //Get the route key for the model.
    public function getRouteKeyName() {
        return 'slug';
    }

    public function hashtags() {
        return $this->belongsToMany(Hashtag::class);
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }
}
