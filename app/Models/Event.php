<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Donation;

class Event extends Model
{
    protected $fillable = ['title', 'slug', 'thumbnail', 'date', 'location', 'description', 'category_id'];

    protected $dates = ['date'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();;
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
