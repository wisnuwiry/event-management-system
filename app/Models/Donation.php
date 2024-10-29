<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = ['account_name', 'amount', 'bank', 'receipt'];

}
