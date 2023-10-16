<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NationalCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name_en',
        'name_mm',
        'nrc_code',
        'created_at',
        'updated_at',
    ];
}
