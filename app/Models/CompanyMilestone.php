<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyMilestone extends Model
{
    protected $fillable = [
        'year',
        'title',
        'description',
        'icon',
        'sort_order',
    ];
}
