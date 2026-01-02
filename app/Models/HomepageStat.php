<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageStat extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'unit',
        'label',
        'section',
        'sort_order',
    ];
}
