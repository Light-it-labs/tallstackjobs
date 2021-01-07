<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'currency', 'salary', 'email'
    ];

    public function hashtags() {
        return $this->belongsToMany(Hashtag::class);
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }
}
