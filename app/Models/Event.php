<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Event extends Model
{
    protected $fillable = ['title', 'slug', 'thumbnail', 'date', 'location', 'description'];

    protected $dates = ['date'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
