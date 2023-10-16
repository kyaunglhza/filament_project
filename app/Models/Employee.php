<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $guarded = [];

    protected $casts = [
        'education' => 'json',
        'work_exp' => 'json',
        'reference_person' => 'json',
        'family_member' => 'json',
        'address' => 'json',
    ];

    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function blood_type()
    {
        return $this->belongsTo(BloodType::class);
    }

    public function marital_status()
    {
        return $this->belongsTo(MaritalStatus::class);

    }

    public function races()
    {
        return $this->belongsTo(Race::class);

    }

    public function nrc()
    {
        return $this->belongsTo(NationalCard::class);

    }

    public function categories()
    {
        return $this->belongsTo(Category::class);

    }
}
