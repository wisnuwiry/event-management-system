<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use App\Models\User;

class Donation extends Model
{
    protected $fillable = ['account_name', 'amount', 'bank', 'receipt', 'status', 'rejection_reason', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
