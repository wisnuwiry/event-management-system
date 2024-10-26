<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'slug', 'thumbnail', 'date', 'location', 'description'];

    protected $dates = ['date'];
}
