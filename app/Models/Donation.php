<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = ['account_name', 'amount', 'bank', 'receipt', 'status', 'rejection_reason', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
