<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceQuery extends Model
{
    use HasFactory;

    protected $table = 'price_queries';
    protected $fillable = ['name','email','message','is_conducted'];
}
